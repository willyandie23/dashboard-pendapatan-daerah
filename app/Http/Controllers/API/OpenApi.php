<?php

namespace App\Http\Controllers\API;

/**
 * @OA\Info(
 *     title="Dashboard Pendapatan Daerah Kab. Katingan API",
 *     version="1.0.0",
 *     description="API untuk Dashboard Pendapatan Daerah Kabupaten Katingan. Digunakan untuk mengelola autentikasi pengguna, data pengguna, dan intregasi data.",
 * )
 *
 * @OA\Server(
 *     url="http://127.0.0.1:8000",
 *     description="Local Development Server"
 * )
 *
 * @OA\SecurityScheme(
 *     securityScheme="bearerAuth",
 *     type="http",
 *     scheme="bearer",
 *     bearerFormat="JWT",
 *     description="Enter your Bearer token in the format: Bearer <token>"
 * )
 *
 * @OA\Schema(
 *     schema="User",
 *     type="object",
 *     @OA\Property(property="id", type="integer", example=1),
 *     @OA\Property(property="name", type="string", example="John Doe"),
 *     @OA\Property(property="email", type="string", example="john@example.com"),
 *     @OA\Property(property="role", type="string", example="admin"),
 *     @OA\Property(property="agency_id", type="integer", nullable=true, example=1)
 * )
 *
 * @OA\Schema(
 *     schema="Period",
 *     type="object",
 *     @OA\Property(property="id", type="integer", example=1),
 *     @OA\Property(property="period", type="string", example="2023"),
 *     @OA\Property(property="deadline", type="string", format="date", example="2023-12-31"),
 * )
 */
class OpenApi
{
    // File ini hanya untuk anotasi, tidak perlu logika
}
