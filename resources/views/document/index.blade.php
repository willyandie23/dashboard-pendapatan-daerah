@extends('layouts.app')

@push('styles')
    
@endpush

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <a href="{{ route('document.create') }}" class="btn btn-success mb-3">
                        <i class="fas fa-plus"></i> Tambah Dokumen
                    </a>
                    <table id="documents-table" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Dokumen</th>
                                <th>Total Download</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody></tbody>
                    </table>
                </div>
            </div>
        </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        $(document).ready(function() {
            const table = $('#documents-table').DataTable({
                processing: true,
                serverSide: false,

                lengthMenu: [[5, 10, 25, -1], [5, 10, 25, "Semua"]],

                pageLength: 10,

                ajax: {
                    url: '/api/dokumen',
                    type: 'GET',
                    dataSrc: "data",
                    error: function(xhr, status, error) {
                        console.error('Error fetching data:', xhr.responseText);
                        Swal.fire('Error!', 'Gagal memuat data.', 'error');
                    }
                },
                columns: [
                    { 
                        data: null, render: (data, type, row, meta) => meta.row + 1 
                    },
                    { 
                        data: 'document_name' 
                    },
                    { 
                        data: 'total_download' 
                    },
                    {
                        data: null,
                        render: function(data, type, row) {
                            return `
                                <a href="/dokumen/${row.id}/edit" class="btn btn-warning btn-sm me-1">
                                    <i class="bi bi-pencil-square"></i> Edit
                                </a>
                                <a href="${row.document_path}" class="btn btn-info btn-sm me-1 download-btn" data-id="${row.id}" target="_blank">
                                    <i class="bi bi-download"></i> Download
                                </a>
                                <button class="btn btn-danger btn-sm delete-file" data-id="${row.id}">
                                    <i class="bi bi-trash"></i> Hapus
                                </button>
                            `;
                        }
                    }
                ],
                drawCallback: function() {
                    $('.delete-file').off('click').on('click', function() {
                        const fileId = $(this).data('id');
                        const apiUrl = `/api/dokumen/${fileId}`;

                        Swal.fire({
                            title: 'Apakah Anda yakin?',
                            text: "File ini akan dihapus permanen!",
                            icon: 'warning',
                            width: 700,
                            heightAuto: true,
                            showCancelButton: true,
                            confirmButtonColor: '#d33',
                            cancelButtonColor: '#3085d6',
                            confirmButtonText: 'Ya, hapus!',
                            cancelButtonText: 'Batal'
                        }).then((result) => {
                            if (result.isConfirmed) {
                                fetch(apiUrl, {
                                        method: 'DELETE',
                                        headers: {
                                            'Content-Type': 'application/json',
                                            'Authorization': `Bearer ${token}`
                                        }
                                    })
                                    .then(response => {
                                        if (!response.ok) {
                                            return response.json().then(err => {
                                                throw new Error(err
                                                    .message ||
                                                    'Network response was not ok'
                                                );
                                            });
                                        }
                                        return response.json();
                                    })
                                    .then(data => {
                                        if (data.message ===
                                            'Document deleted successfully') {
                                            Swal.fire(
                                                'File!',
                                                'File telah dihapus.',
                                                'success'
                                            ).then(() => {
                                                table.ajax.reload();
                                            });
                                        }
                                    })
                                    .catch(error => {
                                        console.error('Error deleting File:',
                                            error);
                                        Swal.fire(
                                            'Gagal!',
                                            'Gagal menghapus File: ' +
                                            error
                                            .message,
                                            'error'
                                        );
                                    });
                            }
                        });
                    });
                    $('.download-btn').on('click', function() {
                        const fileId = $(this).data('id');
                        
                        $.ajax({
                            url: `/dokumen/{id}/download`.replace('{id}', fileId),
                            type: 'POST',
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                                'Authorization': `Bearer ${token}`
                            },
                            success: function(response) {
                                table.ajax.reload();
                            },
                            error: function(xhr, status, error) {
                                Swal.fire('Error!', 'Gagal memperbarui jumlah download.', 'error');
                            }
                        });
                    });
                }
            });
        });
    </script>
@endpush