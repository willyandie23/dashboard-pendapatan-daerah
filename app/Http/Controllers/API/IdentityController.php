<?php

namespace App\Http\Controllers\API;

use App\Models\Identity;
use Illuminate\Http\Request;
use App\Classes\ApiResponseClass;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

/**
 * @OA\Schema(
 *      schema="identity",
 *      type="object",
 *      @OA\Property(property="id", type="integer", example=1),
 *      @OA\Property(property="key", type="string", example="site_heading"),
 *      @OA\Property(property="value", type="string", example="My Website"),
 * )
 */
class IdentityController extends Controller
{
    /**
     * @OA\Get(
     *     path="/api/identitas",
     *     summary="Retrieve website identity data",
     *     tags={"Website Identity"},
     *     security={{"bearerAuth": {}}},
     *     @OA\Response(
     *         response=200,
     *         description="Identity retrieved successfully",
     *         @OA\JsonContent(
     *             type="array",
     *             @OA\Items(ref="#/components/schemas/identity")
     *         )
     *     ),
     *     @OA\Response(
     *         response=401,
     *         description="Unauthorized",
     *         @OA\JsonContent(
     *             @OA\Property(property="message", type="string", example="Unauthorized")
     *         )
     *     ),
     *     @OA\Response(
     *         response=403,
     *         description="Forbidden",
     *         @OA\JsonContent(
     *             @OA\Property(property="message", type="string", example="Forbidden")
     *         )
     *     )
     * )
     */
    public function index()
    {
        try {
            $identities = Identity::pluck('value', 'key')->toArray();
            return ApiResponseClass::success(
                $identities,
                "Identity retrieved successfully"
            );
        } catch (\Throwable $e) {
            return ApiResponseClass::errorException(
                $e,
                "Failed to retrieve identity data"
            );
        }
    }

    /**
     * @OA\Post(
     *     path="/api/identitas",
     *     tags={"Website Identity"},
     *     summary="Create or update website identity",
     *     description="Create or update website identity data including logo and contact information",
     *     security={{"bearerAuth": {}}},
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\MediaType(
     *             mediaType="multipart/form-data",
     *             @OA\Schema(
     *                 @OA\Property(property="site_heading", type="string", example="My Website"),
     *                 @OA\Property(property="site_logo", type="string", format="binary"),
     *                 @OA\Property(property="site_logo_dark", type="string", format="binary"),
     *                 @OA\Property(property="site_favicon", type="string", format="binary"),
     *                 @OA\Property(property="helpdesk", type="string", example="bapenda@katingankab.go.id"),
     *                 @OA\Property(property="call_center", type="string", example="08123456789"),
     *             )
     *         )
     *     ),
     *     @OA\Response(
     *         response=201,
     *         description="Identity created or updated successfully",
     *         @OA\JsonContent(
     *             @OA\Property(property="message", type="string", example="Identity created successfully"),
     *             @OA\Property(property="data", type="object")
     *         )
     *     ),
     *     @OA\Response(
     *         response=401,
     *         description="Unauthorized",
     *         @OA\JsonContent(
     *             @OA\Property(property="message", type="string", example="Unauthenticated.")
     *         )
     *     ),
     *     @OA\Response(
     *         response=422,
     *         description="Validation error",
     *         @OA\JsonContent(
     *             @OA\Property(property="message", type="string", example="The given data was invalid.")
     *         )
     *     ),
     *     @OA\Response(
     *         response=500,
     *         description="Server error",
     *         @OA\JsonContent(
     *             @OA\Property(property="message", type="string", example="Failed to create identity")
     *         )
     *     )
     * )
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'site_heading' => 'nullable|string|max:255',
            'site_logo' => 'nullable|image|mimes:jpg,jpeg,png,gif,svg|max:2048',
            'site_logo_dark' => 'nullable|image|mimes:jpg,jpeg,png,gif,svg|max:2048',
            'site_favicon' => 'nullable|image|mimes:jpg,jpeg,png,gif,svg|max:2048',
            'helpdesk' => 'nullable|string',
            'call_center' => 'nullable|string',
        ]);

        try {
            // Menangani file upload
            if ($request->hasFile('site_logo')) {
                // Hapus logo lama jika ada
                $oldLogo = Identity::where('key', 'site_logo')->first();
                if ($oldLogo && $oldLogo->value) {
                    Storage::disk('public')->delete(str_replace(Storage::url(''), '', $oldLogo->value));
                }

                $logoPath = $request->file('site_logo')->store('logo', 'public');
                $validatedData['site_logo'] = Storage::url($logoPath);
            }

            if ($request->hasFile('site_favicon')) {
                // Hapus logo lama jika ada
                $oldLogo2 = Identity::where('key', 'site_favicon')->first();
                if ($oldLogo2 && $oldLogo2->value) {
                    Storage::disk('public')->delete(str_replace(Storage::url(''), '', $oldLogo2->value));
                }

                $faviconPath = $request->file('site_favicon')->store('favicon', 'public');
                $validatedData['site_favicon'] = Storage::url($faviconPath);
            }

            if ($request->hasFile('site_logo_dark')) {
                // Hapus logo lama jika ada
                $oldLogo3 = Identity::where('key', 'site_logo_dark')->first();
                if ($oldLogo3 && $oldLogo3->value) {
                    Storage::disk('public')->delete(str_replace(Storage::url(''), '', $oldLogo3->value));
                }

                $logoDarkPath = $request->file('site_logo_dark')->store('logo', 'public');
                $validatedData['site_logo_dark'] = Storage::url($logoDarkPath);
            }

            // Simpan atau update data
            $data = [];
            foreach ($validatedData as $key => $value) {
                $identity = Identity::updateOrCreate(
                    ['key' => $key],
                    ['value' => $value]
                );
                $data[$key] = $identity->value;
            }

            return response()->json([
                'message' => 'Identity created or updated successfully',
                'data' => $data
            ], 201);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Failed to create or update identity',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * @OA\Get(
     *     path="/api/identitas/{id}",
     *     summary="Retrieve a single Identity by ID",
     *     tags={"Website Identity"},
     *     security={{"bearerAuth": {}}},
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         description="Identity ID",
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Identity retrieved successfully",
     *         @OA\JsonContent(
     *             @OA\Property(property="key", type="string", example="example_key"),
     *             @OA\Property(property="value", type="string", example="example_value")
     *         )
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Identity not found",
     *         @OA\JsonContent(
     *             @OA\Property(property="message", type="string", example="Identity not found")
     *         )
     *     ),
     *     @OA\Response(
     *         response=500,
     *         description="Server error",
     *         @OA\JsonContent(
     *             @OA\Property(property="message", type="string", example="Failed to retrieve Identity"),
     *             @OA\Property(property="error", type="string", example="Database error")
     *         )
     *     )
     * )
     */

    public function show($id)
    {
        try {
            $identities = Identity::find($id);

            if (!$identities) {
                return response()->json(['message' => 'Identity not found'], 404);
            }

            return ApiResponseClass::success($identities, "Identity retrieved successfully");
        } catch (\Throwable $e) {
            return ApiResponseClass::errorException($e, "Failed to retrieve Identity");
        }
    }

    /**
     * @OA\Put(
     *     path="/api/identitas/{id}",
     *     tags={"Website Identity"},
     *     summary="Update an existing Identity",
     *     description="Update an existing Identity",
     *     security={{"bearerAuth": {}}},
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         description="Identity ID",
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *             @OA\Property(property="key", type="string"),
     *             @OA\Property(property="value", type="string"),
     *         )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Identity updated successfully",
     *         @OA\JsonContent(
     *             @OA\Property(property="message", type="string", example="Identity updated successfully"),
     *             @OA\Property(
     *                 property="Identity",
     *                 type="object",
     *                 @OA\Property(property="key", type="string", example="key_updated"),
     *                 @OA\Property(property="value", type="string", example="value_updated")
     *             )
     *         )
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Identity not found",
     *         @OA\JsonContent(
     *             @OA\Property(property="message", type="string", example="Identity not found")
     *         )
     *     ),
     *     @OA\Response(
     *         response=422,
     *         description="Validation error",
     *         @OA\JsonContent(
     *             @OA\Property(property="message", type="string", example="The given data was invalid."),
     *             @OA\Property(
     *                 property="errors",
     *                 type="object",
     *                 @OA\Property(
     *                     property="key",
     *                     type="array",
     *                     @OA\Items(type="string", example="The key field is required.")
     *                 )
     *             )
     *         )
     *     ),
     *     @OA\Response(
     *         response=500,
     *         description="Server error",
     *         @OA\JsonContent(
     *             @OA\Property(property="message", type="string", example="Failed to update Identity"),
     *             @OA\Property(property="error", type="string", example="Database error")
     *         )
     *     )
     * )
     */

    public function update(Request $request, $id)
    {
        $identities = Identity::find($id);
        if (!$identities) {
            return response()->json(['message' => 'Identity not found'], 404);
        }

        $request->validate([
            'key' => 'required|string|max:255|unique:identities,key,' . $id,
            'value' => 'required|string|max:255',
        ]);

        try {
            $identities->update([
                'key' => $request->key,
                'value' => $request->value,
            ]);

            return response()->json([
                'message' => 'Identity updated successfully',
                'Identity' => $identities
            ], 200);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Failed to update Identity', 'error' => $e->getMessage()], 500);
        }
    }

    /**
     * @OA\Delete(
     *     path="/api/identitas/{id}",
     *     tags={"Website Identity"},
     *     summary="Delete a Identity",
     *     description="Delete a Identity by ID",
     *     security={{"bearerAuth": {}}},
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         description="Identity ID",
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Identity deleted successfully",
     *         @OA\JsonContent(
     *             @OA\Property(property="message", type="string", example="Identity deleted successfully")
     *         )
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Identity not found",
     *         @OA\JsonContent(
     *             @OA\Property(property="message", type="string", example="Identity not found")
     *         )
     *     ),
     *     @OA\Response(
     *         response=500,
     *         description="Server error",
     *         @OA\JsonContent(
     *             @OA\Property(property="message", type="string", example="Failed to delete Identity"),
     *             @OA\Property(property="error", type="string", example="Database error")
     *         )
     *     )
     * )
     */

    public function destroy($id)
    {
        $identities = Identity::find($id);
        if (!$identities) {
            return response()->json(['message' => 'Identity not found'], 404);
        }

        try {
            $identities->delete();

            return response()->json([
                'message' => 'Identity deleted successfully'
            ], 200);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Failed to delete Identity', 'error' => $e->getMessage()], 500);
        }
    }

    // Method untuk view (non-API)
    public function identityShow()
    {
        return view('identity.index');
    }
}
