@extends("layouts.app")

@section("content")

<div class="container-fluid mt-5">
  <div class="row">
    <div class="col-sm-2 bg-light text-center">
        <div>
            <h3>Mon compte :</h3>
        </div>
        <a href=""> Mes infos</a> <br>
        <a href=""> Historique d'achat</a> <br>
    </div>
    <div class="col-sm-10 justify-content-center text-center">
      <div class="row mr-auto">
        <div class="col-sm-12 text-center mr-auto">
          <p>
            <a class="btn btn-dark" data-bs-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
              Detail de la facture du 02/02/23
            </a>
          </p>
          <div class="collapse" id="collapseExample">
            <div class="card card-body" style="display: flex">
              <table class="table table-striped table-bordered">
                <tr>
                  <th> Nom du produit </th>
                  <th> Quantite commander </th>
                  <th> Prix unitaire </th>
                  <th> Prix total </th>
                </tr>
                <tr>
                  <th> Item 1 </th>
                  <th> 1 </th>
                  <th> $3 </th>
                  <th> $3 </th>
                </tr>
              </table>
            </div>
          </div>
        </div>
        </div>
        <div class="row mr-auto">
          <div class="col-sm-12 text-center mr-auto">
            <p>
              <a class="btn btn-dark" data-bs-toggle="collapse" href="#collapseExample0" role="button" aria-expanded="false" aria-controls="collapseExample0">
                Detail de la facture du 01/01/23
              </a>
            </p>
            <div class="collapse" id="collapseExample0">
              <div class="card card-body" style="display: flex">
                <table class="table table-striped table-bordered">
                  <tr>
                    <th> Nom du produit </th>
                    <th> Quantite commander </th>
                    <th> Prix unitaire </th>
                    <th> Prix total </th>
                  </tr>
                  <tr>
                    <th> Item 2 </th>
                    <th> 2 </th>
                    <th> $3 </th>
                    <th> $6 </th>
                  </tr>
                </table>
              </div>
            </div>
          </div>
          </div>
          <div class="row mr-auto">
            <div class="col-sm-12 text-center mr-auto">
              <p>
                <a class="btn btn-dark" data-bs-toggle="collapse" href="#collapseExample1" role="button" aria-expanded="false" aria-controls="collapseExample1">
                  Detail de la facture du 01/11/22
                </a>
              </p>
              <div class="collapse" id="collapseExample1">
                <div class="card card-body" style="display: flex">
                  <table class="table table-striped table-bordered">
                    <tr>
                      <th> Nom du produit </th>
                      <th> Quantite commander </th>
                      <th> Prix unitaire </th>
                      <th> Prix total </th>
                    </tr>
                    <tr>
                      <th> Item 5 </th>
                      <th> 1 </th>
                      <th> $3.5 </th>
                      <th> $3.5 </th>
                    </tr>
                  </table>
                </div>
              </div>
            </div>
            </div>
        
      </div>
    </div>
  </div>
</div>

@endsection