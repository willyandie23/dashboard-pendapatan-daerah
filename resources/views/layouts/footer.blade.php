<footer class="d-footer">
    <div class="row align-items-center justify-content-between">
        <div class="col-auto">
            <p class="mb-0">© 2025 Dashboard Pendapatan - v1.0</p>
        </div>
        <div class="col-auto">
            <p class="mb-0">
                Jumlah Pengunjung: {{ 
                    number_format(\Cache::remember('total_unique_visitors',
                    now()->addDay()->startOfDay(),
                    fn() => \App\Models\UniqueVisitor::count())) 
                }}
            </p>
        </div>
        <div class="col-auto">
            <p class="mb-0" id="footer-info"></span></p>
        </div>
    </div>
</footer>
