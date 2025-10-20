@extends('layouts.app')

@push('styles')
    
@endpush

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
            <div class="card">
                <div class="card-body">
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
                                <a href="${row.document_path}" class="btn btn-info btn-sm me-1 download-btn" data-id="${row.id}" target="_blank">
                                    <i class="bi bi-download"></i> Download
                                </a>
                            `;
                        }
                    }
                ],
                drawCallback: function() {
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