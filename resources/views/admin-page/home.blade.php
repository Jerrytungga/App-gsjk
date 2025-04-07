@extends('admin-page.template.main')
@section('content')

    <div class="container-fluid">
        <div class="row">
          <div class="col-sm-6 col-xl-3">
            <div class="card overflow-hidden rounded-2">
              <div class="card-body pt-3 p-4">
                <h6 class="fw-semibold text-center fs-4">Total Kaum Saleh</h6>
              <h1 class="text-center text-danger ">300</h1>
            </div>
          </div>
        </div>
          <div class="col-sm-6 col-xl-3">
            <div class="card overflow-hidden rounded-2">
              <div class="card-body pt-3 p-4">
                <h6 class="fw-semibold text-center fs-4">Total Kaum Saleh Baru</h6>
              <h1 class="text-center ">300</h1>
            </div>
          </div>
        </div>
          <div class="col-sm-6 col-xl-3">
            <div class="card overflow-hidden rounded-2">
              <div class="card-body pt-3 p-4">
                <h6 class="fw-semibold text-center fs-4">Total Anak RB</h6>
              <h1 class="text-center ">300</h1>
            </div>
          </div>
        </div>
          <div class="col-sm-6 col-xl-3">
            <div class="card overflow-hidden rounded-2">
              <div class="card-body pt-3 p-4">
                <h6 class="fw-semibold text-center fs-4">Anak-anak RB Baru</h6>
              <h1 class="text-center ">300</h1>
            </div>
          </div>
        </div>
        </div>

        <div class="row">
          <div class="col-xl-6">
            <div class="card">
              <div class="card-header">
                <h5>Tabel</h5>
                <select name="" id="" class="form-select form-select-sm col-3">
                  <option value="">Pilih Tabel</option>
                </select>
                <button class="btn btn-outline-primary btn-sm mt-2">Cari</button>
              </div>
              
              <div class="card-body">
                <table class="table">
                  <thead>
                    <tr>
                      <th scope="col">#</th>
                      <th scope="col">First</th>
                      <th scope="col">Last</th>
                      <th scope="col">Handle</th>
                    </tr>
                  </thead>
                  <tbody class="table-group-divider">
                    <tr>
                      <th scope="row">1</th>
                      <td>Mark</td>
                      <td>Otto</td>
                      <td>@mdo</td>
                    </tr>
                    <tr>
                      <th scope="row">2</th>
                      <td>Jacob</td>
                      <td>Thornton</td>
                      <td>@fat</td>
                    </tr>
                    <tr>
                      <th scope="row">3</th>
                      <td colspan="2">Larry the Bird</td>
                      <td>@twitter</td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
        </div>
        @endsection

     