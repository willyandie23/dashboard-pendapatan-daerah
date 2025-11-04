<?php

use DaveJamesMiller\Breadcrumbs\Facades\Breadcrumbs;

# Dashboard
Breadcrumbs::for('dashboard', function ($trail) {
    $trail->push('Dashboard', route('dashboard'));
});

# Laporan
## Laporan Pendapatan Daerah
Breadcrumbs::for('laporan.pendapatan-daerah', function ($trail) {
    $trail->parent('dashboard');
    $trail->push('Laporan Pendapatan Daerah', route('laporan.pendapatan-daerah'));
});
## Laporan Pajak Daerah
Breadcrumbs::for('laporan.pajak-daerah', function ($trail) {
    $trail->parent('dashboard');
    $trail->push('Laporan Pajak Daerah', route('laporan.pajak-daerah'));
});
## Laporan Retribusi Daerah
Breadcrumbs::for('laporan.retribusi-daerah', function ($trail) {
    $trail->parent('dashboard');
    $trail->push('Laporan Retribusi Daerah', route('laporan.retribusi-daerah'));
});
## Laporan PBB
Breadcrumbs::for('laporan.pbb', function ($trail) {
    $trail->parent('dashboard');
    $trail->push('Laporan PBB', route('laporan.pbb'));
});
## Laporan BPHTB
Breadcrumbs::for('laporan.bphtb', function ($trail) {
    $trail->parent('dashboard');
    $trail->push('Laporan BPHTB', route('laporan.bphtb'));
});
## Laporan Penerimaan OPD
Breadcrumbs::for('laporan.penerimaan-opd', function ($trail) {
    $trail->parent('dashboard');
    $trail->push('Laporan Penerimaan OPD', route('laporan.penerimaan-opd'));
});

# Dokumen Publik
Breadcrumbs::for('document.index_public', function ($trail) {
    $trail->parent('dashboard');
    $trail->push('Dokumen', route('document.index_public'));
});

# Identitas
Breadcrumbs::for('identity.index', function ($trail) {
    $trail->parent('dashboard');
    $trail->push('Identitas', route('identity.index'));
});

# Dokumen Admin
Breadcrumbs::for('document.index', function ($trail) {
    $trail->parent('dashboard');
    $trail->push('Dokumen', route('document.index'));
});
Breadcrumbs::for('document.create', function ($trail) {
    $trail->parent('document.index');
    $trail->push('Tambah', route('document.create'));
});
Breadcrumbs::for('document.edit', function ($trail, $document) {
    $trail->parent('document.index');
    $trail->push('Edit', route('document.edit', $document));
});

# Log Aplikasi
Breadcrumbs::for('logs.index', function ($trail) {
    $trail->parent('dashboard');
    $trail->push('App Log', route('logs.index'));
});
Breadcrumbs::for('logs.show', function ($trail, $data) {
    $trail->parent('logs.index');
    $trail->push("Detail", route('logs.show', $data));
});