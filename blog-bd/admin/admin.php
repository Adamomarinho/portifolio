
<!doctype html>
<html lang="en">
  <head>
  <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
    <meta name="theme-color" content="#7952b3">
  </head>
  <style>
    .corpo
    {
        width: 83%;
        position: relative;
    }

    .nav-item .nav-link 
    {
        color: #ffffff;
    }

    .nav-item .nav-link :hover
    {
        color: #0a58ca;
    }

  </style>
  <body>
    
<header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
  <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3 text-center" href="#">BlogBD</a>
  <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="navbar-nav">
    <div class="nav-item text-nowrap">
      <a class="nav-link px-3" href="sair.php">Deslogar-se</a>
    </div>
  </div>
</header>

<div class="container-fluid">
  <div class="row">
    <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-dark sidebar collapse">
      <div class="position-sticky pt-3">
        <ul class="nav flex-column">
          <li class="nav-item">
            <a class="nav-link" aria-current="page" href="#">
            <i class="fa fa-fw fa-star"></i>&nbsp;&nbsp;
              Inicio
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">
            <i class="fa fa-fw fa-user"></i>&nbsp;&nbsp;
              Usuarios
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">
            <i class="fa fa-fw fa-users"></i>&nbsp;&nbsp;
              Permissões de usuários
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">
            <i class="fa fa-fw fa-handshake"></i>&nbsp;&nbsp;
              Situação dos Usuários
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">
            <i class="fa fa-fw fa-list"></i>&nbsp;&nbsp;
              Categorias
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">
            <i class="fa fa-fw fa-comments"></i>&nbsp;&nbsp;
              Postagens
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">
            <i class="fa fa-fw fa-file-pdf"></i>&nbsp;&nbsp;
              Relatórios
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">
            <i class="fa fa-fw fa-bars"></i>&nbsp;&nbsp;
                Logs
            </a>
          </li>
        </ul>

      </div>
    </nav>

    <main class="corpo">
        <br><br>
            <div class="text-center">
                <a href="#" class="btn btn-primary" role="button" style="text-decoration: none;"><i class="fa fa-plus fa fa-fw"></i>&nbsp;&nbsp;Adicionar</a>
            </div>
                <br>
                    <table id="tabela" class="table table-striped" style="width:100%">
                        <thead>
                            <tr>
                                <th class="text-center">Name</th>
                                <th class="text-center">Position</th>
                                <th class="text-center">Office</th>
                                <th class="text-center">Age</th>
                                <th class="text-center">Start date</th>
                                <th class="text-center">Açoes</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="text-center">Tiger Nixon</td>
                                <td class="text-center">System Architect</td>
                                <td class="text-center">Edinburgh</td>
                                <td class="text-center">61</td>
                                <td class="text-center">2011-04-25</td>
                                <td class="text-center">
                                    <a href="#" class="btn btn-info" role="button"><i class="fa fa-eye"></i>&nbsp;&nbsp;Ver</a>
                                    <a href="#" class="btn btn-warning" role="button"><i class="fa fa-fw fa-edit"></i>&nbsp;&nbsp;Editar</a>
                                    <a href="#" class="btn btn-danger" role="button"><i class="fa fa-fw fa-trash"></i>&nbsp;&nbsp;Excluir</a>
                                </td>
                            </tr>
                            <tr>
                                <td class="text-center">Garrett Winters</td>
                                <td class="text-center">Accountant</td>
                                <td class="text-center">Tokyo</td>
                                <td class="text-center">63</td>
                                <td class="text-center">2011-07-25</td>
                                <td class="text-center">
                                    <a href="#" class="btn btn-info" role="button"><i class="fa fa-eye"></i>&nbsp;&nbsp;Ver</a>
                                    <a href="#" class="btn btn-warning" role="button"><i class="fa fa-fw fa-edit"></i>&nbsp;&nbsp;Editar</a>
                                    <a href="#" class="btn btn-danger" role="button"><i class="fa fa-fw fa-trash"></i>&nbsp;&nbsp;Excluir</a>
                                </td>
                            </tr>
                            <tr>
                                <td class="text-center">Ashton Cox</td>
                                <td class="text-center">Junior Technical Author</td>
                                <td class="text-center">San Francisco</td>
                                <td class="text-center">66</td>
                                <td class="text-center">2009-01-12</td>
                                <td class="text-center">
                                    <a href="#" class="btn btn-info" role="button"><i class="fa fa-eye"></i>&nbsp;&nbsp;Ver</a>
                                    <a href="#" class="btn btn-warning" role="button"><i class="fa fa-fw fa-edit"></i>&nbsp;&nbsp;Editar</a>
                                    <a href="#" class="btn btn-danger" role="button"><i class="fa fa-fw fa-trash"></i>&nbsp;&nbsp;Excluir</a>
                                </td>
                            </tr>
                            <tr>
                                <td class="text-center">Cedric Kelly</td>
                                <td class="text-center">Senior Javascript Developer</td>
                                <td class="text-center">Edinburgh</td>
                                <td class="text-center">22</td>
                                <td class="text-center">2012-03-29</td>
                                <td class="text-center">
                                    <a href="#" class="btn btn-info" role="button"><i class="fa fa-eye"></i>&nbsp;&nbsp;Ver</a>
                                    <a href="#" class="btn btn-warning" role="button"><i class="fa fa-fw fa-edit"></i>&nbsp;&nbsp;Editar</a>
                                    <a href="#" class="btn btn-danger" role="button"><i class="fa fa-fw fa-trash"></i>&nbsp;&nbsp;Excluir</a>
                                </td>
                            </tr>
                            <tr>
                                <td class="text-center">Airi Satou</td>
                                <td class="text-center">Accountant</td>
                                <td class="text-center">Tokyo</td>
                                <td class="text-center">33</td>
                                <td class="text-center">2008-11-28</td>
                                <td class="text-center">
                                    <a href="#" class="btn btn-info" role="button"><i class="fa fa-eye"></i>&nbsp;&nbsp;Ver</a>
                                    <a href="#" class="btn btn-warning" role="button"><i class="fa fa-fw fa-edit"></i>&nbsp;&nbsp;Editar</a>
                                    <a href="#" class="btn btn-danger" role="button"><i class="fa fa-fw fa-trash"></i>&nbsp;&nbsp;Excluir</a>
                                </td>
                            </tr>
                            <tr>
                                <td class="text-center">Brielle Williamson</td>
                                <td class="text-center">Integration Specialist</td>
                                <td class="text-center">New York</td>
                                <td class="text-center">61</td>
                                <td class="text-center">2012-12-02</td>
                                <td class="text-center">
                                    <a href="#" class="btn btn-info" role="button"><i class="fa fa-eye"></i>&nbsp;&nbsp;Ver</a>
                                    <a href="#" class="btn btn-warning" role="button"><i class="fa fa-fw fa-edit"></i>&nbsp;&nbsp;Editar</a>
                                    <a href="#" class="btn btn-danger" role="button"><i class="fa fa-fw fa-trash"></i>&nbsp;&nbsp;Excluir</a>
                                </td>
                            </tr>
                            <tr>
                                <td class="text-center">Herrod Chandler</td>
                                <td class="text-center">Sales Assistant</td>
                                <td class="text-center">San Francisco</td>
                                <td class="text-center">59</td>
                                <td class="text-center">2012-08-06</td>
                                <td class="text-center">
                                    <a href="#" class="btn btn-info" role="button"><i class="fa fa-eye"></i>&nbsp;&nbsp;Ver</a>
                                    <a href="#" class="btn btn-warning" role="button"><i class="fa fa-fw fa-edit"></i>&nbsp;&nbsp;Editar</a>
                                    <a href="#" class="btn btn-danger" role="button"><i class="fa fa-fw fa-trash"></i>&nbsp;&nbsp;Excluir</a>
                                </td>
                            </tr>
                            <tr>
                                <td class="text-center">Rhona Davidson</td>
                                <td class="text-center">Integration Specialist</td>
                                <td class="text-center">Tokyo</td>
                                <td class="text-center">55</td>
                                <td class="text-center">2010-10-14</td>
                                <td class="text-center">
                                    <a href="#" class="btn btn-info" role="button"><i class="fa fa-eye"></i>&nbsp;&nbsp;Ver</a>
                                    <a href="#" class="btn btn-warning" role="button"><i class="fa fa-fw fa-edit"></i>&nbsp;&nbsp;Editar</a>
                                    <a href="#" class="btn btn-danger" role="button"><i class="fa fa-fw fa-trash"></i>&nbsp;&nbsp;Excluir</a>
                                </td>
                            </tr>
                            <tr>
                                <td class="text-center">Colleen Hurst</td>
                                <td class="text-center">Javascript Developer</td>
                                <td class="text-center">San Francisco</td>
                                <td class="text-center">39</td>
                                <td class="text-center">2009-09-15</td>
                                <td class="text-center">
                                    <a href="#" class="btn btn-info" role="button"><i class="fa fa-eye"></i>&nbsp;&nbsp;Ver</a>
                                    <a href="#" class="btn btn-warning" role="button"><i class="fa fa-fw fa-edit"></i>&nbsp;&nbsp;Editar</a>
                                    <a href="#" class="btn btn-danger" role="button"><i class="fa fa-fw fa-trash"></i>&nbsp;&nbsp;Excluir</a>
                                </td>
                            </tr>
                            <tr>
                                <td class="text-center">Sonya Frost</td>
                                <td class="text-center">Software Engineer</td>
                                <td class="text-center">Edinburgh</td>
                                <td class="text-center">23</td>
                                <td class="text-center">2008-12-13</td>
                                <td class="text-center">
                                    <a href="#" class="btn btn-info" role="button"><i class="fa fa-eye"></i>&nbsp;&nbsp;Ver</a>
                                    <a href="#" class="btn btn-warning" role="button"><i class="fa fa-fw fa-edit"></i>&nbsp;&nbsp;Editar</a>
                                    <a href="#" class="btn btn-danger" role="button"><i class="fa fa-fw fa-trash"></i>&nbsp;&nbsp;Excluir</a>
                                </td>
                            </tr>
                            <tr>
                                <td class="text-center">Jena Gaines</td>
                                <td class="text-center">Office Manager</td>
                                <td class="text-center">London</td>
                                <td class="text-center">30</td>
                                <td class="text-center">2008-12-19</td>
                                <td class="text-center">
                                    <a href="#" class="btn btn-info" role="button"><i class="fa fa-eye"></i>&nbsp;&nbsp;Ver</a>
                                    <a href="#" class="btn btn-warning" role="button"><i class="fa fa-fw fa-edit"></i>&nbsp;&nbsp;Editar</a>
                                    <a href="#" class="btn btn-danger" role="button"><i class="fa fa-fw fa-trash"></i>&nbsp;&nbsp;Excluir</a>
                                </td>
                            </tr>
                            <tr>
                                <td class="text-center">Quinn Flynn</td>
                                <td class="text-center">Support Lead</td>
                                <td class="text-center">Edinburgh</td>
                                <td class="text-center">22</td>
                                <td class="text-center">2013-03-03</td>
                                <td class="text-center">
                                    <a href="#" class="btn btn-info" role="button"><i class="fa fa-eye"></i>&nbsp;&nbsp;Ver</a>
                                    <a href="#" class="btn btn-warning" role="button"><i class="fa fa-fw fa-edit"></i>&nbsp;&nbsp;Editar</a>
                                    <a href="#" class="btn btn-danger" role="button"><i class="fa fa-fw fa-trash"></i>&nbsp;&nbsp;Excluir</a>
                                </td>
                            </tr>
                            <tr>
                                <td class="text-center">Charde Marshall</td>
                                <td class="text-center">Regional Director</td>
                                <td class="text-center">San Francisco</td>
                                <td class="text-center">36</td>
                                <td class="text-center">2008-10-16</td>
                                <td class="text-center">
                                    <a href="#" class="btn btn-info" role="button"><i class="fa fa-eye"></i>&nbsp;&nbsp;Ver</a>
                                    <a href="#" class="btn btn-warning" role="button"><i class="fa fa-fw fa-edit"></i>&nbsp;&nbsp;Editar</a>
                                    <a href="#" class="btn btn-danger" role="button"><i class="fa fa-fw fa-trash"></i>&nbsp;&nbsp;Excluir</a>
                                </td>
                            </tr>
                            <tr>
                                <td class="text-center">Haley Kennedy</td>
                                <td class="text-center">Senior Marketing Designer</td>
                                <td class="text-center">London</td>
                                <td class="text-center">43</td>
                                <td class="text-center">2012-12-18</td>
                                <td class="text-center">
                                    <a href="#" class="btn btn-info" role="button"><i class="fa fa-eye"></i>&nbsp;&nbsp;Ver</a>
                                    <a href="#" class="btn btn-warning" role="button"><i class="fa fa-fw fa-edit"></i>&nbsp;&nbsp;Editar</a>
                                    <a href="#" class="btn btn-danger" role="button"><i class="fa fa-fw fa-trash"></i>&nbsp;&nbsp;Excluir</a>
                                </td>
                            </tr>
                            <tr>
                                <td class="text-center">Tatyana Fitzpatrick</td>
                                <td class="text-center">Regional Director</td>
                                <td class="text-center">London</td>
                                <td class="text-center">19</td>
                                <td class="text-center">2010-03-17</td>
                                <td class="text-center">
                                    <a href="#" class="btn btn-info" role="button"><i class="fa fa-eye"></i>&nbsp;&nbsp;Ver</a>
                                    <a href="#" class="btn btn-warning" role="button"><i class="fa fa-fw fa-edit"></i>&nbsp;&nbsp;Editar</a>
                                    <a href="#" class="btn btn-danger" role="button"><i class="fa fa-fw fa-trash"></i>&nbsp;&nbsp;Excluir</a>
                                </td>
                            </tr>
                            <tr>
                                <td class="text-center">Michael Silva</td>
                                <td class="text-center">Marketing Designer</td>
                                <td class="text-center">London</td>
                                <td class="text-center">66</td>
                                <td class="text-center">2012-11-27</td>
                                <td class="text-center">
                                    <a href="#" class="btn btn-info" role="button"><i class="fa fa-eye"></i>&nbsp;&nbsp;Ver</a>
                                    <a href="#" class="btn btn-warning" role="button"><i class="fa fa-fw fa-edit"></i>&nbsp;&nbsp;Editar</a>
                                    <a href="#" class="btn btn-danger" role="button"><i class="fa fa-fw fa-trash"></i>&nbsp;&nbsp;Excluir</a>
                                </td>
                            </tr>
                            <tr>
                                <td class="text-center">Paul Byrd</td>
                                <td class="text-center">Chief Financial Officer (CFO)</td>
                                <td class="text-center">New York</td>
                                <td class="text-center">64</td>
                                <td class="text-center">2010-06-09</td>
                                <td class="text-center">
                                    <a href="#" class="btn btn-info" role="button"><i class="fa fa-eye"></i>&nbsp;&nbsp;Ver</a>
                                    <a href="#" class="btn btn-warning" role="button"><i class="fa fa-fw fa-edit"></i>&nbsp;&nbsp;Editar</a>
                                    <a href="#" class="btn btn-danger" role="button"><i class="fa fa-fw fa-trash"></i>&nbsp;&nbsp;Excluir</a>
                                </td>
                            </tr>
                            <tr>
                                <td class="text-center">Gloria Little</td>
                                <td class="text-center">Systems Administrator</td>
                                <td class="text-center">New York</td>
                                <td class="text-center">59</td>
                                <td class="text-center">2009-04-10</td>
                                <td class="text-center">
                                    <a href="#" class="btn btn-info" role="button"><i class="fa fa-eye"></i>&nbsp;&nbsp;Ver</a>
                                    <a href="#" class="btn btn-warning" role="button"><i class="fa fa-fw fa-edit"></i>&nbsp;&nbsp;Editar</a>
                                    <a href="#" class="btn btn-danger" role="button"><i class="fa fa-fw fa-trash"></i>&nbsp;&nbsp;Excluir</a>
                                </td>
                            </tr>
                            <tr>
                                <td class="text-center">Bradley Greer</td>
                                <td class="text-center">Software Engineer</td>
                                <td class="text-center">London</td>
                                <td class="text-center">41</td>
                                <td class="text-center">2012-10-13</td>
                                <td class="text-center">
                                    <a href="#" class="btn btn-info" role="button"><i class="fa fa-eye"></i>&nbsp;&nbsp;Ver</a>
                                    <a href="#" class="btn btn-warning" role="button"><i class="fa fa-fw fa-edit"></i>&nbsp;&nbsp;Editar</a>
                                    <a href="#" class="btn btn-danger" role="button"><i class="fa fa-fw fa-trash"></i>&nbsp;&nbsp;Excluir</a>
                                </td>
                            </tr>
                            <tr>
                                <td class="text-center">Dai Rios</td>
                                <td class="text-center">Personnel Lead</td>
                                <td class="text-center">Edinburgh</td>
                                <td class="text-center">35</td>
                                <td class="text-center">2012-09-26</td>
                                <td class="text-center">
                                    <a href="#" class="btn btn-info" role="button"><i class="fa fa-eye"></i>&nbsp;&nbsp;Ver</a>
                                    <a href="#" class="btn btn-warning" role="button"><i class="fa fa-fw fa-edit"></i>&nbsp;&nbsp;Editar</a>
                                    <a href="#" class="btn btn-danger" role="button"><i class="fa fa-fw fa-trash"></i>&nbsp;&nbsp;Excluir</a>
                                </td>
                            </tr>
                            <tr>
                                <td class="text-center">Jenette Caldwell</td>
                                <td class="text-center">Development Lead</td>
                                <td class="text-center">New York</td>
                                <td class="text-center">30</td>
                                <td class="text-center">2011-09-03</td>
                                <td class="text-center">
                                    <a href="#" class="btn btn-info" role="button"><i class="fa fa-eye"></i>&nbsp;&nbsp;Ver</a>
                                    <a href="#" class="btn btn-warning" role="button"><i class="fa fa-fw fa-edit"></i>&nbsp;&nbsp;Editar</a>
                                    <a href="#" class="btn btn-danger" role="button"><i class="fa fa-fw fa-trash"></i>&nbsp;&nbsp;Excluir</a>
                                </td>
                            </tr>
                            <tr>
                                <td class="text-center">Yuri Berry</td>
                                <td class="text-center">Chief Marketing Officer (CMO)</td>
                                <td class="text-center">New York</td>
                                <td class="text-center">40</td>
                                <td class="text-center">2009-06-25</td>
                                <td class="text-center">
                                    <a href="#" class="btn btn-info" role="button"><i class="fa fa-eye"></i>&nbsp;&nbsp;Ver</a>
                                    <a href="#" class="btn btn-warning" role="button"><i class="fa fa-fw fa-edit"></i>&nbsp;&nbsp;Editar</a>
                                    <a href="#" class="btn btn-danger" role="button"><i class="fa fa-fw fa-trash"></i>&nbsp;&nbsp;Excluir</a>
                                </td>
                            </tr>
                            <tr>
                                <td class="text-center">Caesar Vance</td>
                                <td class="text-center">Pre-Sales Support</td>
                                <td class="text-center">New York</td>
                                <td class="text-center">21</td>
                                <td class="text-center">2011-12-12</td>
                                <td class="text-center">
                                    <a href="#" class="btn btn-info" role="button"><i class="fa fa-eye"></i>&nbsp;&nbsp;Ver</a>
                                    <a href="#" class="btn btn-warning" role="button"><i class="fa fa-fw fa-edit"></i>&nbsp;&nbsp;Editar</a>
                                    <a href="#" class="btn btn-danger" role="button"><i class="fa fa-fw fa-trash"></i>&nbsp;&nbsp;Excluir</a>
                                </td>
                            </tr>
                            <tr>
                                <td class="text-center">Doris Wilder</td>
                                <td class="text-center">Sales Assistant</td>
                                <td class="text-center">Sydney</td>
                                <td class="text-center">23</td>
                                <td class="text-center">2010-09-20</td>
                                <td class="text-center">
                                    <a href="#" class="btn btn-info" role="button"><i class="fa fa-eye"></i>&nbsp;&nbsp;Ver</a>
                                    <a href="#" class="btn btn-warning" role="button"><i class="fa fa-fw fa-edit"></i>&nbsp;&nbsp;Editar</a>
                                    <a href="#" class="btn btn-danger" role="button"><i class="fa fa-fw fa-trash"></i>&nbsp;&nbsp;Excluir</a>
                                </td>
                            </tr>
                            <tr>
                                <td class="text-center">Angelica Ramos</td>
                                <td class="text-center">Chief Executive Officer (CEO)</td>
                                <td class="text-center">London</td>
                                <td class="text-center">47</td>
                                <td class="text-center">2009-10-09</td>
                                <td class="text-center">
                                    <a href="#" class="btn btn-info" role="button"><i class="fa fa-eye"></i>&nbsp;&nbsp;Ver</a>
                                    <a href="#" class="btn btn-warning" role="button"><i class="fa fa-fw fa-edit"></i>&nbsp;&nbsp;Editar</a>
                                    <a href="#" class="btn btn-danger" role="button"><i class="fa fa-fw fa-trash"></i>&nbsp;&nbsp;Excluir</a>
                                </td>
                            </tr>
                            <tr>
                                <td class="text-center">Gavin Joyce</td>
                                <td class="text-center">Developer</td>
                                <td class="text-center">Edinburgh</td>
                                <td class="text-center">42</td>
                                <td class="text-center">2010-12-22</td>
                                <td class="text-center">
                                    <a href="#" class="btn btn-info" role="button"><i class="fa fa-eye"></i>&nbsp;&nbsp;Ver</a>
                                    <a href="#" class="btn btn-warning" role="button"><i class="fa fa-fw fa-edit"></i>&nbsp;&nbsp;Editar</a>
                                    <a href="#" class="btn btn-danger" role="button"><i class="fa fa-fw fa-trash"></i>&nbsp;&nbsp;Excluir</a>
                                </td>
                            </tr>
                            <tr>
                                <td class="text-center">Jennifer Chang</td>
                                <td class="text-center">Regional Director</td>
                                <td class="text-center">Singapore</td>
                                <td class="text-center">28</td>
                                <td class="text-center">2010-11-14</td>
                                <td class="text-center">
                                    <a href="#" class="btn btn-info" role="button"><i class="fa fa-eye"></i>&nbsp;&nbsp;Ver</a>
                                    <a href="#" class="btn btn-warning" role="button"><i class="fa fa-fw fa-edit"></i>&nbsp;&nbsp;Editar</a>
                                    <a href="#" class="btn btn-danger" role="button"><i class="fa fa-fw fa-trash"></i>&nbsp;&nbsp;Excluir</a>
                                </td>
                            </tr>
                            <tr>
                                <td class="text-center">Brenden Wagner</td>
                                <td class="text-center">Software Engineer</td>
                                <td class="text-center">San Francisco</td>
                                <td class="text-center">28</td>
                                <td class="text-center">2011-06-07</td>
                                <td class="text-center">
                                    <a href="#" class="btn btn-info" role="button"><i class="fa fa-eye"></i>&nbsp;&nbsp;Ver</a>
                                    <a href="#" class="btn btn-warning" role="button"><i class="fa fa-fw fa-edit"></i>&nbsp;&nbsp;Editar</a>
                                    <a href="#" class="btn btn-danger" role="button"><i class="fa fa-fw fa-trash"></i>&nbsp;&nbsp;Excluir</a>
                                </td>
                            </tr>
                            <tr>
                                <td class="text-center">Fiona Green</td>
                                <td class="text-center">Chief Operating Officer (COO)</td>
                                <td class="text-center">San Francisco</td>
                                <td class="text-center">48</td>
                                <td class="text-center">2010-03-11</td>
                                <td class="text-center">
                                    <a href="#" class="btn btn-info" role="button"><i class="fa fa-eye"></i>&nbsp;&nbsp;Ver</a>
                                    <a href="#" class="btn btn-warning" role="button"><i class="fa fa-fw fa-edit"></i>&nbsp;&nbsp;Editar</a>
                                    <a href="#" class="btn btn-danger" role="button"><i class="fa fa-fw fa-trash"></i>&nbsp;&nbsp;Excluir</a>
                                </td>
                            </tr>
                            <tr>
                                <td class="text-center">Shou Itou</td>
                                <td class="text-center">Regional Marketing</td>
                                <td class="text-center">Tokyo</td>
                                <td class="text-center">20</td>
                                <td class="text-center">2011-08-14</td>
                                <td class="text-center">
                                    <a href="#" class="btn btn-info" role="button"><i class="fa fa-eye"></i>&nbsp;&nbsp;Ver</a>
                                    <a href="#" class="btn btn-warning" role="button"><i class="fa fa-fw fa-edit"></i>&nbsp;&nbsp;Editar</a>
                                    <a href="#" class="btn btn-danger" role="button"><i class="fa fa-fw fa-trash"></i>&nbsp;&nbsp;Excluir</a>
                                </td>
                            </tr>
                            <tr>
                                <td class="text-center">Michelle House</td>
                                <td class="text-center">Integration Specialist</td>
                                <td class="text-center">Sydney</td>
                                <td class="text-center">37</td>
                                <td class="text-center">2011-06-02</td>
                                <td class="text-center">
                                    <a href="#" class="btn btn-info" role="button"><i class="fa fa-eye"></i>&nbsp;&nbsp;Ver</a>
                                    <a href="#" class="btn btn-warning" role="button"><i class="fa fa-fw fa-edit"></i>&nbsp;&nbsp;Editar</a>
                                    <a href="#" class="btn btn-danger" role="button"><i class="fa fa-fw fa-trash"></i>&nbsp;&nbsp;Excluir</a>
                                </td>
                            </tr>
                            <tr>
                                <td class="text-center">Suki Burks</td>
                                <td class="text-center">Developer</td>
                                <td class="text-center">London</td>
                                <td class="text-center">53</td>
                                <td class="text-center">2009-10-22</td>
                                <td class="text-center">
                                    <a href="#" class="btn btn-info" role="button"><i class="fa fa-eye"></i>&nbsp;&nbsp;Ver</a>
                                    <a href="#" class="btn btn-warning" role="button"><i class="fa fa-fw fa-edit"></i>&nbsp;&nbsp;Editar</a>
                                    <a href="#" class="btn btn-danger" role="button"><i class="fa fa-fw fa-trash"></i>&nbsp;&nbsp;Excluir</a>
                                </td>
                            </tr>
                            <tr>
                                <td class="text-center">Prescott Bartlett</td>
                                <td class="text-center">Technical Author</td>
                                <td class="text-center">London</td>
                                <td class="text-center">27</td>
                                <td class="text-center">2011-05-07</td>
                                <td class="text-center">
                                    <a href="#" class="btn btn-info" role="button"><i class="fa fa-eye"></i>&nbsp;&nbsp;Ver</a>
                                    <a href="#" class="btn btn-warning" role="button"><i class="fa fa-fw fa-edit"></i>&nbsp;&nbsp;Editar</a>
                                    <a href="#" class="btn btn-danger" role="button"><i class="fa fa-fw fa-trash"></i>&nbsp;&nbsp;Excluir</a>
                                </td>
                            </tr>
                            <tr>
                                <td class="text-center">Gavin Cortez</td>
                                <td class="text-center">Team Leader</td>
                                <td class="text-center">San Francisco</td>
                                <td class="text-center">22</td>
                                <td class="text-center">2008-10-26</td>
                                <td class="text-center">
                                    <a href="#" class="btn btn-info" role="button"><i class="fa fa-eye"></i>&nbsp;&nbsp;Ver</a>
                                    <a href="#" class="btn btn-warning" role="button"><i class="fa fa-fw fa-edit"></i>&nbsp;&nbsp;Editar</a>
                                    <a href="#" class="btn btn-danger" role="button"><i class="fa fa-fw fa-trash"></i>&nbsp;&nbsp;Excluir</a>
                                </td>
                            </tr>
                            <tr>
                                <td class="text-center">Martena Mccray</td>
                                <td class="text-center">Post-Sales support</td>
                                <td class="text-center">Edinburgh</td>
                                <td class="text-center">46</td>
                                <td class="text-center">2011-03-09</td>
                                <td class="text-center">
                                    <a href="#" class="btn btn-info" role="button"><i class="fa fa-eye"></i>&nbsp;&nbsp;Ver</a>
                                    <a href="#" class="btn btn-warning" role="button"><i class="fa fa-fw fa-edit"></i>&nbsp;&nbsp;Editar</a>
                                    <a href="#" class="btn btn-danger" role="button"><i class="fa fa-fw fa-trash"></i>&nbsp;&nbsp;Excluir</a>
                                </td>
                            </tr>
                            <tr>
                                <td class="text-center">Unity Butler</td>
                                <td class="text-center">Marketing Designer</td>
                                <td class="text-center">San Francisco</td>
                                <td class="text-center">47</td>
                                <td class="text-center">2009-12-09</td>
                                <td class="text-center">
                                    <a href="#" class="btn btn-info" role="button"><i class="fa fa-eye"></i>&nbsp;&nbsp;Ver</a>
                                    <a href="#" class="btn btn-warning" role="button"><i class="fa fa-fw fa-edit"></i>&nbsp;&nbsp;Editar</a>
                                    <a href="#" class="btn btn-danger" role="button"><i class="fa fa-fw fa-trash"></i>&nbsp;&nbsp;Excluir</a>
                                </td>
                            </tr>
                            <tr>
                                <td class="text-center">Howard Hatfield</td>
                                <td class="text-center">Office Manager</td>
                                <td class="text-center">San Francisco</td>
                                <td class="text-center">51</td>
                                <td class="text-center">2008-12-16</td>
                                <td class="text-center">
                                    <a href="#" class="btn btn-info" role="button"><i class="fa fa-eye"></i>&nbsp;&nbsp;Ver</a>
                                    <a href="#" class="btn btn-warning" role="button"><i class="fa fa-fw fa-edit"></i>&nbsp;&nbsp;Editar</a>
                                    <a href="#" class="btn btn-danger" role="button"><i class="fa fa-fw fa-trash"></i>&nbsp;&nbsp;Excluir</a>
                                </td>
                            </tr>
                            <tr>
                                <td class="text-center">Hope Fuentes</td>
                                <td class="text-center">Secretary</td>
                                <td class="text-center">San Francisco</td>
                                <td class="text-center">41</td>
                                <td class="text-center">2010-02-12</td>
                                <td class="text-center">
                                    <a href="#" class="btn btn-info" role="button"><i class="fa fa-eye"></i>&nbsp;&nbsp;Ver</a>
                                    <a href="#" class="btn btn-warning" role="button"><i class="fa fa-fw fa-edit"></i>&nbsp;&nbsp;Editar</a>
                                    <a href="#" class="btn btn-danger" role="button"><i class="fa fa-fw fa-trash"></i>&nbsp;&nbsp;Excluir</a>
                                </td>
                            </tr>
                            <tr>
                                <td class="text-center">Vivian Harrell</td>
                                <td class="text-center">Financial Controller</td>
                                <td class="text-center">San Francisco</td>
                                <td class="text-center">62</td>
                                <td class="text-center">2009-02-14</td>
                                <td class="text-center">
                                    <a href="#" class="btn btn-info" role="button"><i class="fa fa-eye"></i>&nbsp;&nbsp;Ver</a>
                                    <a href="#" class="btn btn-warning" role="button"><i class="fa fa-fw fa-edit"></i>&nbsp;&nbsp;Editar</a>
                                    <a href="#" class="btn btn-danger" role="button"><i class="fa fa-fw fa-trash"></i>&nbsp;&nbsp;Excluir</a>
                                </td>
                            </tr>
                            <tr>
                                <td class="text-center">Timothy Mooney</td>
                                <td class="text-center">Office Manager</td>
                                <td class="text-center">London</td>
                                <td class="text-center">37</td>
                                <td class="text-center">2008-12-11</td>
                                <td class="text-center">
                                    <a href="#" class="btn btn-info" role="button"><i class="fa fa-eye"></i>&nbsp;&nbsp;Ver</a>
                                    <a href="#" class="btn btn-warning" role="button"><i class="fa fa-fw fa-edit"></i>&nbsp;&nbsp;Editar</a>
                                    <a href="#" class="btn btn-danger" role="button"><i class="fa fa-fw fa-trash"></i>&nbsp;&nbsp;Excluir</a>
                                </td>
                            </tr>
                            <tr>
                                <td class="text-center">Jackson Bradshaw</td>
                                <td class="text-center">Director</td>
                                <td class="text-center">New York</td>
                                <td class="text-center">65</td>
                                <td class="text-center">2008-09-26</td>
                                <td class="text-center">
                                    <a href="#" class="btn btn-info" role="button"><i class="fa fa-eye"></i>&nbsp;&nbsp;Ver</a>
                                    <a href="#" class="btn btn-warning" role="button"><i class="fa fa-fw fa-edit"></i>&nbsp;&nbsp;Editar</a>
                                    <a href="#" class="btn btn-danger" role="button"><i class="fa fa-fw fa-trash"></i>&nbsp;&nbsp;Excluir</a>
                                </td>
                            </tr>
                            <tr>
                                <td class="text-center">Olivia Liang</td>
                                <td class="text-center">Support Engineer</td>
                                <td class="text-center">Singapore</td>
                                <td class="text-center">64</td>
                                <td class="text-center">2011-02-03</td>
                                <td class="text-center">
                                    <a href="#" class="btn btn-info" role="button"><i class="fa fa-eye"></i>&nbsp;&nbsp;Ver</a>
                                    <a href="#" class="btn btn-warning" role="button"><i class="fa fa-fw fa-edit"></i>&nbsp;&nbsp;Editar</a>
                                    <a href="#" class="btn btn-danger" role="button"><i class="fa fa-fw fa-trash"></i>&nbsp;&nbsp;Excluir</a>
                                </td>
                            </tr>
                            <tr>
                                <td class="text-center">Bruno Nash</td>
                                <td class="text-center">Software Engineer</td>
                                <td class="text-center">London</td>
                                <td class="text-center">38</td>
                                <td class="text-center">2011-05-03</td>
                                <td class="text-center">
                                    <a href="#" class="btn btn-info" role="button"><i class="fa fa-eye"></i>&nbsp;&nbsp;Ver</a>
                                    <a href="#" class="btn btn-warning" role="button"><i class="fa fa-fw fa-edit"></i>&nbsp;&nbsp;Editar</a>
                                    <a href="#" class="btn btn-danger" role="button"><i class="fa fa-fw fa-trash"></i>&nbsp;&nbsp;Excluir</a>
                                </td>
                            </tr>
                            <tr>
                                <td class="text-center">Sakura Yamamoto</td>
                                <td class="text-center">Support Engineer</td>
                                <td class="text-center">Tokyo</td>
                                <td class="text-center">37</td>
                                <td class="text-center">2009-08-19</td>
                                <td class="text-center">
                                    <a href="#" class="btn btn-info" role="button"><i class="fa fa-eye"></i>&nbsp;&nbsp;Ver</a>
                                    <a href="#" class="btn btn-warning" role="button"><i class="fa fa-fw fa-edit"></i>&nbsp;&nbsp;Editar</a>
                                    <a href="#" class="btn btn-danger" role="button"><i class="fa fa-fw fa-trash"></i>&nbsp;&nbsp;Excluir</a>
                                </td>
                            </tr>
                            <tr>
                                <td class="text-center">Thor Walton</td>
                                <td class="text-center">Developer</td>
                                <td class="text-center">New York</td>
                                <td class="text-center">61</td>
                                <td class="text-center">2013-08-11</td>
                                <td class="text-center">
                                    <a href="#" class="btn btn-info" role="button"><i class="fa fa-eye"></i>&nbsp;&nbsp;Ver</a>
                                    <a href="#" class="btn btn-warning" role="button"><i class="fa fa-fw fa-edit"></i>&nbsp;&nbsp;Editar</a>
                                    <a href="#" class="btn btn-danger" role="button"><i class="fa fa-fw fa-trash"></i>&nbsp;&nbsp;Excluir</a>
                                </td>
                            </tr>
                            <tr>
                                <td class="text-center">Finn Camacho</td>
                                <td class="text-center">Support Engineer</td>
                                <td class="text-center">San Francisco</td>
                                <td class="text-center">47</td>
                                <td class="text-center">2009-07-07</td>
                                <td class="text-center">
                                    <a href="#" class="btn btn-info" role="button"><i class="fa fa-eye"></i>&nbsp;&nbsp;Ver</a>
                                    <a href="#" class="btn btn-warning" role="button"><i class="fa fa-fw fa-edit"></i>&nbsp;&nbsp;Editar</a>
                                    <a href="#" class="btn btn-danger" role="button"><i class="fa fa-fw fa-trash"></i>&nbsp;&nbsp;Excluir</a>
                                </td>
                            </tr>
                            <tr>
                                <td class="text-center">Serge Baldwin</td>
                                <td class="text-center">Data Coordinator</td>
                                <td class="text-center">Singapore</td>
                                <td class="text-center">64</td>
                                <td class="text-center">2012-04-09</td>
                                <td class="text-center">
                                    <a href="#" class="btn btn-info" role="button"><i class="fa fa-eye"></i>&nbsp;&nbsp;Ver</a>
                                    <a href="#" class="btn btn-warning" role="button"><i class="fa fa-fw fa-edit"></i>&nbsp;&nbsp;Editar</a>
                                    <a href="#" class="btn btn-danger" role="button"><i class="fa fa-fw fa-trash"></i>&nbsp;&nbsp;Excluir</a>
                                </td>
                            </tr>
                            <tr>
                                <td class="text-center">Zenaida Frank</td>
                                <td class="text-center">Software Engineer</td>
                                <td class="text-center">New York</td>
                                <td class="text-center">63</td>
                                <td class="text-center">2010-01-04</td>
                                <td class="text-center">
                                    <a href="#" class="btn btn-info" role="button"><i class="fa fa-eye"></i>&nbsp;&nbsp;Ver</a>
                                    <a href="#" class="btn btn-warning" role="button"><i class="fa fa-fw fa-edit"></i>&nbsp;&nbsp;Editar</a>
                                    <a href="#" class="btn btn-danger" role="button"><i class="fa fa-fw fa-trash"></i>&nbsp;&nbsp;Excluir</a>
                                </td>
                            </tr>
                            <tr>
                                <td class="text-center">Zorita Serrano</td>
                                <td class="text-center">Software Engineer</td>
                                <td class="text-center">San Francisco</td>
                                <td class="text-center">56</td>
                                <td class="text-center">2012-06-01</td>
                                <td class="text-center">
                                    <a href="#" class="btn btn-info" role="button"><i class="fa fa-eye"></i>&nbsp;&nbsp;Ver</a>
                                    <a href="#" class="btn btn-warning" role="button"><i class="fa fa-fw fa-edit"></i>&nbsp;&nbsp;Editar</a>
                                    <a href="#" class="btn btn-danger" role="button"><i class="fa fa-fw fa-trash"></i>&nbsp;&nbsp;Excluir</a>
                                </td>
                            </tr>
                            <tr>
                                <td class="text-center">Jennifer Acosta</td>
                                <td class="text-center">Junior Javascript Developer</td>
                                <td class="text-center">Edinburgh</td>
                                <td class="text-center">43</td>
                                <td class="text-center">2013-02-01</td>
                                <td class="text-center">
                                    <a href="#" class="btn btn-info" role="button"><i class="fa fa-eye"></i>&nbsp;&nbsp;Ver</a>
                                    <a href="#" class="btn btn-warning" role="button"><i class="fa fa-fw fa-edit"></i>&nbsp;&nbsp;Editar</a>
                                    <a href="#" class="btn btn-danger" role="button"><i class="fa fa-fw fa-trash"></i>&nbsp;&nbsp;Excluir</a>
                                </td>
                            </tr>
                            <tr>
                                <td class="text-center">Cara Stevens</td>
                                <td class="text-center">Sales Assistant</td>
                                <td class="text-center">New York</td>
                                <td class="text-center">46</td>
                                <td class="text-center">2011-12-06</td>
                                <td class="text-center">
                                    <a href="#" class="btn btn-info" role="button"><i class="fa fa-eye"></i>&nbsp;&nbsp;Ver</a>
                                    <a href="#" class="btn btn-warning" role="button"><i class="fa fa-fw fa-edit"></i>&nbsp;&nbsp;Editar</a>
                                    <a href="#" class="btn btn-danger" role="button"><i class="fa fa-fw fa-trash"></i>&nbsp;&nbsp;Excluir</a>
                                </td>
                            </tr>
                            <tr>
                                <td class="text-center">Hermione Butler</td>
                                <td class="text-center">Regional Director</td>
                                <td class="text-center">London</td>
                                <td class="text-center">47</td>
                                <td class="text-center">2011-03-21</td>
                                <td class="text-center">
                                    <a href="#" class="btn btn-info" role="button"><i class="fa fa-eye"></i>&nbsp;&nbsp;Ver</a>
                                    <a href="#" class="btn btn-warning" role="button"><i class="fa fa-fw fa-edit"></i>&nbsp;&nbsp;Editar</a>
                                    <a href="#" class="btn btn-danger" role="button"><i class="fa fa-fw fa-trash"></i>&nbsp;&nbsp;Excluir</a>
                                </td>
                            </tr>
                            <tr>
                                <td class="text-center">Lael Greer</td>
                                <td class="text-center">Systems Administrator</td>
                                <td class="text-center">London</td>
                                <td class="text-center">21</td>
                                <td class="text-center">2009-02-27</td>
                                <td class="text-center">
                                    <a href="#" class="btn btn-info" role="button"><i class="fa fa-eye"></i>&nbsp;&nbsp;Ver</a>
                                    <a href="#" class="btn btn-warning" role="button"><i class="fa fa-fw fa-edit"></i>&nbsp;&nbsp;Editar</a>
                                    <a href="#" class="btn btn-danger" role="button"><i class="fa fa-fw fa-trash"></i>&nbsp;&nbsp;Excluir</a>
                                </td>
                            </tr>
                            <tr>
                                <td class="text-center">Jonas Alexander</td>
                                <td class="text-center">Developer</td>
                                <td class="text-center">San Francisco</td>
                                <td class="text-center">30</td>
                                <td class="text-center">2010-07-14</td>
                                <td class="text-center">
                                    <a href="#" class="btn btn-info" role="button"><i class="fa fa-eye"></i>&nbsp;&nbsp;Ver</a>
                                    <a href="#" class="btn btn-warning" role="button"><i class="fa fa-fw fa-edit"></i>&nbsp;&nbsp;Editar</a>
                                    <a href="#" class="btn btn-danger" role="button"><i class="fa fa-fw fa-trash"></i>&nbsp;&nbsp;Excluir</a>
                                </td>
                            </tr>
                            <tr>
                                <td class="text-center">Shad Decker</td>
                                <td class="text-center">Regional Director</td>
                                <td class="text-center">Edinburgh</td>
                                <td class="text-center">51</td>
                                <td class="text-center">2008-11-13</td>
                                <td class="text-center">
                                    <a href="#" class="btn btn-info" role="button"><i class="fa fa-eye"></i>&nbsp;&nbsp;Ver</a>
                                    <a href="#" class="btn btn-warning" role="button"><i class="fa fa-fw fa-edit"></i>&nbsp;&nbsp;Editar</a>
                                    <a href="#" class="btn btn-danger" role="button"><i class="fa fa-fw fa-trash"></i>&nbsp;&nbsp;Excluir</a>
                                </td>
                            </tr>
                            <tr>
                                <td class="text-center">Michael Bruce</td>
                                <td class="text-center">Javascript Developer</td>
                                <td class="text-center">Singapore</td>
                                <td class="text-center">29</td>
                                <td class="text-center">2011-06-27</td>
                                <td class="text-center">
                                    <a href="#" class="btn btn-info" role="button"><i class="fa fa-eye"></i>&nbsp;&nbsp;Ver</a>
                                    <a href="#" class="btn btn-warning" role="button"><i class="fa fa-fw fa-edit"></i>&nbsp;&nbsp;Editar</a>
                                    <a href="#" class="btn btn-danger" role="button"><i class="fa fa-fw fa-trash"></i>&nbsp;&nbsp;Excluir</a>
                                </td>
                            </tr>
                            <tr>
                                <td class="text-center">Donna Snider</td>
                                <td class="text-center">Customer Support</td>
                                <td class="text-center">New York</td>
                                <td class="text-center">27</td>
                                <td class="text-center">2011-01-25</td>
                                <td class="text-center">
                                    <a href="#" class="btn btn-info" role="button"><i class="fa fa-eye"></i>&nbsp;&nbsp;Ver</a>
                                    <a href="#" class="btn btn-warning" role="button"><i class="fa fa-fw fa-edit"></i>&nbsp;&nbsp;Editar</a>
                                    <a href="#" class="btn btn-danger" role="button"><i class="fa fa-fw fa-trash"></i>&nbsp;&nbsp;Excluir</a>
                                </td>
                            </tr>
                        </tbody>
                    </table>

    </main>
  </div>
</div>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>
    <script type="text/javascript">
        $(document).ready
        (
            function() 
                {
                    $('#tabela').DataTable
                    ( 
                        {
                        language: {
                        url:"https://cdn.datatables.net/plug-ins/1.11.3/i18n/pt_br.json" },
                        dom: 'Bfrtip'
                        } 
                    );
                } 
        );
    </script>
  </body>
</html>
