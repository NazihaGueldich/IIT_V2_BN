@include('Admin.layout.header')



<div class="container-xxl flex-grow-1 container-p-y">
    <div class="row">
      <h1>Dashboard</h1>
      
        <div class="col-lg-4 col-md-4 order-1" style="padding-top: 20px;">
            <div class="row">
                <div class="col-lg-6 col-md-12 col-6 mb-4">
                    <div class="card" style="width: 300px;">
                        <div class="card-body">
                            <img src="https://cdn-icons-png.flaticon.com/512/1548/1548205.png" alt="Admin"
                                width="150px;" style="margin-left: 50px;">
                            <p class="card-title m-3" style="text-align: center;"><strong style="font-size: 16px;">{{ $nbDocumentsEnCours }}
                                    Document(s) demandé(s)</strong></p></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-4 col-md-4 order-1" style="padding-top: 20px;">
            <div class="row">
                <div class="col-lg-6 col-md-12 col-6 mb-4">
                    <div class="card" style="width: 300px;">
                        <div class="card-body">
                            <img src="https://cdn-icons-png.flaticon.com/512/1945/1945674.png" alt="Admin"
                                width="150px;" style="margin-left: 50px;">
                            <p class="card-title m-3" style="text-align: center;"><strong style="font-size: 16px;">{{$nbStageEnCours}} Demandé(s) de stage</strong></p></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-4 order-1" style="padding-top: 20px;">
            <div class="row">
                <div class="col-lg-6 col-md-12 col-6 mb-4">
                    <div class="card" style="width: 300px;">
                        <div class="card-body">
                            <img src="https://cdn-icons-png.flaticon.com/512/2179/2179260.png" alt="Admin"
                                width="150px;" style="margin-left: 50px;">
                            <p class="card-title m-3" style="text-align: center;"><strong style="font-size: 16px;">{{$nbAdmins}} Admin(s)</strong></p></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- / Content -->

@include('Admin.layout.footer')
