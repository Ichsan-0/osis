@extends('main.master')

@section('title','Jabatan OSIS')

@section('content')
<div class="m-content">
  <div class="m-alert m-alert--icon m-alert--air m-alert--square alert alert-dismissible m--margin-bottom-30" role="alert">
    <div class="m-alert__icon">
      <i class="flaticon-exclamation m--font-brand"></i>
    </div>
    <div class="m-alert__text">
      The Metronic Datatable component supports local or remote data binding. For the local data binding you can pass javascript array as data source. In this example the grid fetches its data from a javascript array data source. It also defines the schema model of the data source. In addition to the visualization, the Datatable provides built-in support for operations over data such as sorting, filtering and paging performed in user browser(frontend).
    </div>
  </div>
  <div class="m-portlet m-portlet--mobile">
    <div class="m-portlet__head">
      <div class="m-portlet__head-caption">
        <div class="m-portlet__head-title">
          <h3 class="m-portlet__head-text">
            Data Jabatan OSIS
            <small>
              initialized from javascript array
            </small>
          </h3>
        </div>
      </div>
      <div class="m-portlet__head-tools">
        <ul class="m-portlet__nav">
          <li class="m-portlet__nav-item">
            <div class="m-dropdown m-dropdown--inline m-dropdown--arrow m-dropdown--align-right m-dropdown--align-push" data-dropdown-toggle="hover" aria-expanded="true">
              <a href="#" class="m-portlet__nav-link btn btn-lg btn-secondary  m-btn m-btn--icon m-btn--icon-only m-btn--pill  m-dropdown__toggle">
                <i class="la la-ellipsis-h m--font-brand"></i>
              </a>
              <div class="m-dropdown__wrapper">
                <span class="m-dropdown__arrow m-dropdown__arrow--right m-dropdown__arrow--adjust"></span>
                <div class="m-dropdown__inner">
                  <div class="m-dropdown__body">
                    <div class="m-dropdown__content">
                      <ul class="m-nav">
                        <li class="m-nav__section m-nav__section--first">
                          <span class="m-nav__section-text">
                            Quick Actions
                          </span>
                        </li>
                        <li class="m-nav__item">
                          <a href="" class="m-nav__link">
                            <i class="m-nav__link-icon flaticon-share"></i>
                            <span class="m-nav__link-text">
                              Create Post
                            </span>
                          </a>
                        </li>
                        <li class="m-nav__item">
                          <a href="" class="m-nav__link">
                            <i class="m-nav__link-icon flaticon-chat-1"></i>
                            <span class="m-nav__link-text">
                              Send Messages
                            </span>
                          </a>
                        </li>
                        <li class="m-nav__item">
                          <a href="" class="m-nav__link">
                            <i class="m-nav__link-icon flaticon-multimedia-2"></i>
                            <span class="m-nav__link-text">
                              Upload File
                            </span>
                          </a>
                        </li>
                        <li class="m-nav__section">
                          <span class="m-nav__section-text">
                            Useful Links
                          </span>
                        </li>
                        <li class="m-nav__item">
                          <a href="" class="m-nav__link">
                            <i class="m-nav__link-icon flaticon-info"></i>
                            <span class="m-nav__link-text">
                              FAQ
                            </span>
                          </a>
                        </li>
                        <li class="m-nav__item">
                          <a href="" class="m-nav__link">
                            <i class="m-nav__link-icon flaticon-lifebuoy"></i>
                            <span class="m-nav__link-text">
                              Support
                            </span>
                          </a>
                        </li>
                        <li class="m-nav__separator m-nav__separator--fit m--hide"></li>
                        <li class="m-nav__item m--hide">
                          <a href="#" class="btn btn-outline-danger m-btn m-btn--pill m-btn--wide btn-sm">
                            Submit
                          </a>
                        </li>
                      </ul>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </li>
        </ul>
      </div>
    </div>
    <div class="m-portlet__body">
      <!--begin: Search Form -->
      <div class="m-form m-form--label-align-right m--margin-top-20 m--margin-bottom-30">
        <div class="row align-items-center">
          <div class="col-xl-8 order-2 order-xl-1">
            <div class="form-group m-form__group row align-items-center">
              
              <div class="col-md-6">
                <div class="m-input-icon m-input-icon--left">
                  <input type="text" class="form-control m-input" placeholder="Search..." id="generalSearch">
                  <span class="m-input-icon__icon m-input-icon__icon--left">
                    <span>
                      <i class="la la-search"></i>
                    </span>
                  </span>
                </div>
              </div>
            </div>
          </div>
          <div class="col-xl-4 order-1 order-xl-2 m--align-right">
            <a href="" class="btn btn-primary m-btn m-btn--custom m-btn--icon m-btn--air m-btn--pill">
              <span>
                <i class="la la-plus-circle"></i>
                <span>
                  Tambah data
                </span>
              </span>
            </a>
            <div class="m-separator m-separator--dashed d-xl-none"></div>
          </div>
        </div>
      </div>
      <!--end: Search Form -->
<!--begin: Datatable -->
      <table class="m-datatable" id="html_table" width="100%">
        <thead>
          <tr>
            <th data-field="nama_jabatan">Jabatan</th>
            <th data-field="deskripsi">Keterangan</th>
            <th data-field="aksi">Aksi</th>
          </tr>
        </thead>
        <tbody>
        </tbody>
      </table>

      <!--end: Datatable -->
    </div>
  </div>
</div>

@endsection

@section('script')
<script>
  //== Class definition
  var DatatableHtmlTableDemo = function() {
    //== Private functions
  
    // demo initializer
    var demo = function() {
      $.ajax({
        url: '/api/jabatan', // URL untuk mengambil data
        method: 'GET',
        success: function(data) {
          var datatable = $('.m-datatable').mDatatable({
            search: {
              input: $('#generalSearch'),
            },
            data: {
              type: 'local',
              source: data, // Sumber data dari AJAX
              pageSize: 10, // Ukuran halaman
            },
            columns: [
            
              {
                field: 'nama_jabatan',
                title: 'Jabatan',
                textAlign: 'center'
              },
              {
                field: 'deskripsi',
                title: 'Keterangan',
              },
              {
                field: 'aksi',
                title: 'Aksi',
                template: function(row) {
                  return '<button class="btn btn-sm btn-primary">Edit</button>'; // Contoh tombol aksi
                }
              },
            ],
          });
        },
        error: function(xhr) {
          console.error('Error fetching data:', xhr);
        }
      });
    };
  
    return {
      //== Public functions
      init: function() {
        // init demo
        demo();
      },
    };
  }();
  
  jQuery(document).ready(function() {
    DatatableHtmlTableDemo.init();
  });
</script>
@endsection