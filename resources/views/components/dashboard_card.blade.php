<div class="col-xxl-4 col-xl-4 col-lg-4 col-md-6 col-sm-12 col-xs-12">
    <div class="card info-card sales-card">
        <div class="card-body">
            <h5 class="card-title">{{ ucfirst($title) }} <span>| {{ ucfirst($description) }}</span></h5>
            <div class="d-flex align-items-center">
                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                    <i class="bi bi-{{ $icon }}"></i>
                </div>
                <div class="ps-3">
                    <h6>{{ $value }} {{ $title }}</h6>
                </div>
            </div>
        </div>
    </div>
</div>
