<?php

namespace App\Http\Controllers\API;

use App\Models\Document;
use Illuminate\Http\Request;
use App\Classes\ApiResponseClass;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

/**
 * @OA\Schema(
 *     schema="document",
 *     type="object",
 *     @OA\Property(property="id", type="integer", example=1),
 *     @OA\Property(property="document_name", type="string", example="document_example.pdf"),
 *     @OA\Property(property="document_path", type="string", example="http://example.com/storage/file_example.pdf"),
 *     @OA\Property(property="total_download", type="integer", example=10),
 *     @OA\Property(property="display", type="boolean", example=false)
 * )
 */
class DocumentController extends Controller
{
    /**
     * @OA\Get(
     *     path="/api/dokumen",
     *     summary="Retrieve a list of Document files",
     *     tags={"Document"},
     *     security={{"bearerAuth": {}}},
     *     @OA\Response(
     *         response=200,
     *         description="Document files retrieved successfully",
     *         @OA\JsonContent(
     *            type="array",
     *             @OA\Items(ref="#/components/schemas/document")
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
            $documents = Document::orderBy('id', 'desc')->get();
            return ApiResponseClass::success($documents, "Document retrieved successfully");
        } catch (\Throwable $e) {
            return ApiResponseClass::errorException($e, "Failed to retrieve Document Data");
        }
    }

    /**
     * @OA\Post(
     *     path="/api/dokumen",
     *     summary="Upload a Document",
     *     tags={"Document"},
     *     security={{"bearerAuth": {}}},
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *             @OA\Property(property="file", type="string", format="binary", description="PDF file"),
     *             @OA\Property(property="display", type="boolean", example=false) 
     *         )
     *     ),
     *     @OA\Response(
     *         response=201,
     *         description="Document uploaded successfully",
     *         @OA\JsonContent(
     *             @OA\Property(property="message", type="string", example="Document uploaded successfully"),
     *             @OA\Property(property="file", ref="#/components/schemas/document")
     *         )
     *     ),
     *     @OA\Response(
     *         response=422,
     *         description="Validation error",
     *         @OA\JsonContent(
     *             @OA\Property(property="message", type="string", example="Invalid file type or size")
     *         )
     *     ),
     *     @OA\Response(
     *         response=500,
     *         description="Server error",
     *         @OA\JsonContent(
     *             @OA\Property(property="message", type="string", example="Failed to upload file"),
     *             @OA\Property(property="error", type="string", example="Database error")
     *         )
     *     )
     * )
     */
    public function store(Request $request)
    {
        $request->validate([
            'document_name' => 'required|string|max:255',
            'file' => 'required|mimes:pdf,doc,docx,xls,xlsx|max:5120',
            'display' => 'nullable|boolean',
        ], [
            'document_name.required' => 'Nama dokumen wajib diisi',
            'document_name.max' => 'Nama dokumen maksimal 255 karakter',
            'file.required' => 'File harus dipilih',
            'file.mimes' => 'Format file harus PDF, DOC, DOCX, XLS, atau XLSX',
            'file.max' => 'Ukuran file tidak boleh lebih dari 5MB',
        ]);

        try {
            if (!$request->hasFile('file')) {
                return response()->json([
                    'success' => false,
                    'message' => 'File tidak ditemukan'
                ], 400);
            }

            $file = $request->file('file');
            
            if (!$file->isValid()) {
                return response()->json([
                    'success' => false,
                    'message' => 'File corrupt atau upload gagal'
                ], 400);
            }

            $fileName = time() . '_' . $file->getClientOriginalName();
            $path = $file->storeAs('documents', $fileName, 'public');
            
            $documents = Document::create([
                'document_name' => $request->document_name,
                'document_path' => Storage::url($path),
                'total_download' => 0,
                'display' => $request->boolean('display', true),
            ]);

            return response()->json([
                'success' => true,
                'message' => 'Dokumen berhasil diupload',
                'data' => $documents
            ], 201);
            
        } catch (\Throwable $e) {
            Log::error('Upload failed: ' . $e->getMessage());
            return response()->json([
                'success' => false,
                'message' => 'Gagal mengupload dokumen: ' . $e->getMessage()
            ], 500);
        }
    }

    /**
     * @OA\Get(
     *     path="/api/dokumen/{id}",
     *     summary="Retrieve a single Document file by ID",
     *     tags={"Document"},
     *     security={{"bearerAuth": {}}},
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         description="Document file ID",
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Document file retrieved successfully",
     *         @OA\JsonContent(ref="#/components/schemas/document")
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Document file not found",
     *         @OA\JsonContent(
     *             @OA\Property(property="message", type="string", example="Document not found")
     *         )
     *     )
     * )
     */
    public function show(string $id)
    {
        try {
            $documents = Document::find($id);

            if (!$documents) {
                return response()->json(['message' => 'Document not found'], 404);
            }

            return ApiResponseClass::success($documents, "Document retrieved successfully");
        } catch (\Throwable $e) {
            return ApiResponseClass::errorException($e, "Failed to retrieve Document");
        }
    }

    /**
     * @OA\Put(
     *     path="/api/dokumen/{id}",
     *     summary="Update a file by ID",
     *     tags={"Document"},
     *     security={{"bearerAuth": {}}},
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         description="File ID to update",
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *             @OA\Property(property="document_name", type="string", example="updated_file.pdf"),
     *             @OA\Property(property="file", type="string", format="binary", description="PDF file to replace"),
     *             @OA\Property(property="display", type="boolean", example=true)
     *         )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Document updated successfully",
     *         @OA\JsonContent(
     *             @OA\Property(property="message", type="string", example="Document updated successfully"),
     *             @OA\Property(property="file", ref="#/components/schemas/document")
     *         )
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Document not found",
     *         @OA\JsonContent(
     *             @OA\Property(property="message", type="string", example="Document not found")
     *         )
     *     )
     * )
     */
    public function update(Request $request, $id)
    {
        $documents = Document::find($id);

        if (!$documents) {
            return response()->json([
                'success' => false,
                'message' => 'Dokumen tidak ditemukan'
            ], 404);
        }

        $request->validate([
            'document_name' => 'required|string|max:255',
            'file' => 'nullable|mimes:pdf,doc,docx,xls,xlsx|max:5120',
            'display' => 'nullable|boolean',
        ], [
            'document_name.required' => 'Nama dokumen wajib diisi',
            'document_name.max' => 'Nama dokumen maksimal 255 karakter',
            'file.mimes' => 'Format file harus PDF, DOC, DOCX, XLS, atau XLSX',
            'file.max' => 'Ukuran file tidak boleh lebih dari 5MB',
        ]);

        try {
            // Update nama dokumen
            $documents->document_name = $request->document_name;
            $documents->display = $request->boolean('display', $documents->display);

            // Update file jika ada file baru
            if ($request->hasFile('file')) {
                $file = $request->file('file');
                
                if (!$file->isValid()) {
                    return response()->json([
                        'success' => false,
                        'message' => 'File corrupt atau upload gagal'
                    ], 400);
                }

                // Hapus file lama jika ada
                if ($documents->document_path) {
                    $oldPath = str_replace('/storage/', '', $documents->document_path);
                    Storage::disk('public')->delete($oldPath);
                }

                // Upload file baru
                $fileName = time() . '_' . $file->getClientOriginalName();
                $path = $file->storeAs('documents', $fileName, 'public');
                $documents->document_path = Storage::url($path);
            }

            $documents->save();

            return response()->json([
                'success' => true,
                'message' => 'Dokumen berhasil diperbarui',
                'data' => $documents
            ], 200);
            
        } catch (\Throwable $e) {
            Log::error('Update failed: ' . $e->getMessage());
            return response()->json([
                'success' => false,
                'message' => 'Gagal memperbarui dokumen: ' . $e->getMessage()
            ], 500);
        }
    }

    /**
     * @OA\Delete(
     *     path="/api/dokumen/{id}",
     *     summary="Delete a Document by ID",
     *     tags={"Document"},
     *     security={{"bearerAuth": {}}},
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         description="Document ID to delete",
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Document deleted successfully",
     *         @OA\JsonContent(
     *             @OA\Property(property="message", type="string", example="Document deleted successfully")
     *         )
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Document not found",
     *         @OA\JsonContent(
     *             @OA\Property(property="message", type="string", example="Document not found")
     *         )
     *     )
     * )
     */
    public function destroy($id)
    {
        $documents = Document::find($id);

        if (!$documents) {
            return response()->json(['message' => 'Document not found'], 404);
        }

        try {
            Storage::delete('public/documents/' . basename($documents->document_path));

            $documents->delete();

            return response()->json(['message' => 'Document deleted successfully'], 200);
        } catch (\Throwable $e) {
            return response()->json(['message' => 'Failed to delete Document', 'error' => $e->getMessage()], 500);
        }
    }

    /**
     * @OA\Post(
     *     path="/api/dokumen/{id}/document",
     *     summary="Download a Document by ID",
     *     tags={"Document"},
     *     security={{"bearerAuth": {}}},
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         description="Document ID to download",
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Document downloaded successfully",
     *         @OA\JsonContent(
     *             @OA\Property(property="message", type="string", example="Document downloaded successfully")
     *         )
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Document not found",
     *         @OA\JsonContent(
     *             @OA\Property(property="message", type="string", example="Document not found")
     *         )
     *     )
     * )
     */
    public function download($id)
    {
        $documents = Document::find($id);
        if (!$documents) {
            return response()->json(['message' => 'File not found'], 404);
        }

        $documents->increment('total_download');

        $filePath = 'documents/' . basename($documents->document_path);

        return Storage::disk('public')->download($filePath);
    }

    // Method untuk view (non-API)
    public function documentShow()
    {
        return view('document.index');
    }

    public function create()
    {
        $documents = Document::all();
        return view('document.create', compact('documents'));
    }

    public function edit($id)
    {
        $document = Document::findOrFail($id);
        return view('document.edit', compact('document'));
    }

    public function documentPublicShow()
    {
        return view('document.index_public');
    }
}