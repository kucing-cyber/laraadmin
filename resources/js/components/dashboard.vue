<template>
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-12">

                <!-- Info box -->

             <section class="content-header">
                  <div class="container-fluid">
                    <div class="row">
                      <div class="col-md-4 col-sm-6 col-12">
                        <div class="info-box bg-info">
                          <span class="info-box-icon bg-info"><i class="fa fa-user-graduate"></i></span>

                          <div class="info-box-content">
                            <span class="info-box-text">PENDIDIK DAN TENAGA KEPENDIDIKAN</span>
                            <span class="info-box-number">1,410</span>
                          </div>
                          <!-- /.info-box-content -->
                        </div>
                        <!-- /.info-box -->
                      </div>
                      <!-- /.col -->
                      <div class="col-md-4 col-sm-6 col-12">
                        <div class="info-box bg-success">
                          <span class="info-box-icon bg-success"><i class="fa fa-user-edit"></i></span>

                          <div class="info-box-content">
                            <span class="info-box-text">SISWA</span>
                            <span class="info-box-number">712</span>
                          </div>
                          <!-- /.info-box-content -->
                        </div>
                        <!-- /.info-box -->
                      </div>
                      <!-- /.col -->

                      <!-- /.col -->
                      <div class="col-md-4 col-sm-6 col-12">
                        <div class="info-box bg-danger">
                          <span class="info-box-icon bg-danger"><i class="fa fa-chalkboard"></i></span>

                          <div class="info-box-content">
                            <span class="info-box-text">ROMBEL</span>
                            <span class="info-box-number">93,139</span>
                          </div>
                          <!-- /.info-box-content -->
                        </div>
                        <!-- /.info-box -->
                      </div>
                      <!-- /.col -->
                    </div>
                    <!-- /.row -->
                    <div class="row">
                    <!-- bawah kanan -->
                    <section class="col-lg-7 connectedSortable ui-sortable">
                        <div class="card">
              <div class="card-header ui-sortable-handle">
                <h3 class="card-title">
                  <i class="fa fa-building mr-1"></i>
                  SMA HANG TUAH 5
                </h3>
              </div><!-- /.card-header -->
              <div class="card-body">


                  <div class="form-group row">
                      <label for="npsn" class="col-sm-4">NPSN :
                      </label>
                      <div class="col-sm-8">
                      <label id="npsn">69859774</label>
                      </div>
                  </div>

                  <div class="form-group row">
                      <label for="npsn" class="col-sm-4">EMAIL :
                      </label>
                      <div class="col-sm-8">
                      <label id="npsn">smahangtuah5_sidoarjo@yahoo.co.id</label>
                      </div>
                  </div>

                  <div class="form-group row">
                      <label for="npsn" class="col-sm-4">ALAMAT :
                      </label>
                      <div class="col-sm-8">
                      <label id="npsn">Jln M. Ridwan No.07</label>
                      </div>
                  </div>

                  <div class="form-group row">
                      <label for="npsn" class="col-sm-4">KECAMATAN :
                      </label>
                      <div class="col-sm-8">
                      <label id="npsn">Candi</label>
                      </div>
                  </div>

                  <div class="form-group row">
                      <label for="npsn" class="col-sm-4">KABUPATEN :
                      </label>
                      <div class="col-sm-8">
                      <label id="npsn">SIdoarjo</label>
                      </div>
                  </div>

                  <div class="form-group row">
                      <label for="npsn" class="col-sm-4">KEPALA SEKOLAH :
                      </label>
                      <div class="col-sm-8">
                      <label id="npsn">Erni Dwiyanti M.Pd</label>
                      </div>
                  </div>

              </div><!-- /.card-body -->
            </div>
                    </section>
                    <!-- end bawah kanan -->

                    <!-- calender -->
                    <section class="col-lg-5 connectedSortable ui-sortable">

                        <!-- Calendar -->
                        <div class="card bg-gradient-success">
                          <div class="card-header border-0 ui-sortable-handle" style="cursor: move;">

                            <h3 class="card-title">
                              <i class="far fa-calendar-alt"></i>
                              Calendar
                            </h3>
                            <!-- tools card -->
                            <div class="card-tools">
                              <!-- button with a dropdown -->
                              <div class="btn-group">
                                <button type="button" class="btn btn-success btn-sm dropdown-toggle" data-toggle="dropdown">
                                  <i class="fas fa-bars"></i></button>
                                <div class="dropdown-menu float-right" role="menu">
                                  <a href="#" class="dropdown-item">Add new event</a>
                                  <a href="#" class="dropdown-item">Clear events</a>
                                  <div class="dropdown-divider"></div>
                                  <a href="#" class="dropdown-item">View calendar</a>
                                </div>
                              </div>
                              <button type="button" class="btn btn-success btn-sm" data-card-widget="collapse">
                                <i class="fas fa-minus"></i>
                              </button>
                              <button type="button" class="btn btn-success btn-sm" data-card-widget="remove">
                                <i class="fas fa-times"></i>
                              </button>
                            </div>
                            <!-- /. tools -->
                          </div>
                          <!-- /.card-header -->
                          <div class="card-body pt-0">
                            <!--The calendar -->
                            <div id="calendar" style="width: 100%"><div class="bootstrap-datetimepicker-widget usetwentyfour">
                              <ul class="list-unstyled"><li class="show"><div class="datepicker">
                                <div class="datepicker-days" style=""><table class="table table-sm">
                                  <thead>
                                    <tr>
                                    <th class="prev" data-action="previous">
                                    <span class="fa fa-chevron-left" title="Previous Month">
                                      </span></th><th class="picker-switch" data-action="pickerSwitch" colspan="5" title="Select Month">January 2020</th>
                                    <th class="next" data-action="next"><span class="fa fa-chevron-right" title="Next Month"></span></th>
                                    </tr>
                                    <tr>
                                      <th class="dow">Su</th><th class="dow">Mo</th>
                                      <th class="dow">Tu</th><th class="dow">We</th>
                                      <th class="dow">Th</th><th class="dow">Fr</th>
                                      <th class="dow">Sa</th>
                                    </tr>
                                  </thead>
                                  <tbody>
                                    <tr>
                                      <td data-action="selectDay" data-day="12/29/2019" class="day old weekend">29</td>
                                      <td data-action="selectDay" data-day="12/30/2019" class="day old">30</td>
                                      <td data-action="selectDay" data-day="12/31/2019" class="day old">31</td>
                                      <td data-action="selectDay" data-day="01/01/2020" class="day">1</td>
                                      <td data-action="selectDay" data-day="01/02/2020" class="day">2</td>
                                      <td data-action="selectDay" data-day="01/03/2020" class="day">3</td>
                                      <td data-action="selectDay" data-day="01/04/2020" class="day weekend">4</td>
                                    </tr>
                                    <tr>
                                      <td data-action="selectDay" data-day="01/05/2020" class="day weekend">5</td>
                                      <td data-action="selectDay" data-day="01/06/2020" class="day">6</td>
                                      <td data-action="selectDay" data-day="01/07/2020" class="day">7</td>
                                      <td data-action="selectDay" data-day="01/08/2020" class="day">8</td>
                                      <td data-action="selectDay" data-day="01/09/2020" class="day">9</td>
                                      <td data-action="selectDay" data-day="01/10/2020" class="day">10</td>
                                      <td data-action="selectDay" data-day="01/11/2020" class="day weekend">11</td>
                                    </tr>
                                    <tr>
                                      <td data-action="selectDay" data-day="01/12/2020" class="day weekend">12</td>
                                      <td data-action="selectDay" data-day="01/13/2020" class="day">13</td>
                                      <td data-action="selectDay" data-day="01/14/2020" class="day">14</td>
                                      <td data-action="selectDay" data-day="01/15/2020" class="day">15</td>
                                      <td data-action="selectDay" data-day="01/16/2020" class="day">16</td>
                                      <td data-action="selectDay" data-day="01/17/2020" class="day">17</td>
                                      <td data-action="selectDay" data-day="01/18/2020" class="day weekend">18</td>
                                    </tr>
                                    <tr>
                                      <td data-action="selectDay" data-day="01/19/2020" class="day active today weekend">19</td>
                                      <td data-action="selectDay" data-day="01/20/2020" class="day">20</td>
                                      <td data-action="selectDay" data-day="01/21/2020" class="day">21</td>
                                      <td data-action="selectDay" data-day="01/22/2020" class="day">22</td>
                                      <td data-action="selectDay" data-day="01/23/2020" class="day">23</td>
                                      <td data-action="selectDay" data-day="01/24/2020" class="day">24</td>
                                      <td data-action="selectDay" data-day="01/25/2020" class="day weekend">25</td>
                                    </tr>
                                    <tr>
                                      <td data-action="selectDay" data-day="01/26/2020" class="day weekend">26</td>
                                      <td data-action="selectDay" data-day="01/27/2020" class="day">27</td>
                                      <td data-action="selectDay" data-day="01/28/2020" class="day">28</td>
                                      <td data-action="selectDay" data-day="01/29/2020" class="day">29</td>
                                      <td data-action="selectDay" data-day="01/30/2020" class="day">30</td>
                                      <td data-action="selectDay" data-day="01/31/2020" class="day">31</td>
                                      <td data-action="selectDay" data-day="02/01/2020" class="day new weekend">1</td>
                                    </tr>
                                    <tr>
                                      <td data-action="selectDay" data-day="02/02/2020" class="day new weekend">2</td>
                                      <td data-action="selectDay" data-day="02/03/2020" class="day new">3</td>
                                      <td data-action="selectDay" data-day="02/04/2020" class="day new">4</td>
                                      <td data-action="selectDay" data-day="02/05/2020" class="day new">5</td>
                                      <td data-action="selectDay" data-day="02/06/2020" class="day new">6</td>
                                      <td data-action="selectDay" data-day="02/07/2020" class="day new">7</td>
                                      <td data-action="selectDay" data-day="02/08/2020" class="day new weekend">8</td>
                                    </tr>
                                    </tbody>
                                    </table>
                                  </div>
                                  <div class="datepicker-months" style="display: none;">
                                    <table class="table-condensed">
                                      <thead>
                                        <tr>
                                          <th class="prev" data-action="previous">
                                            <span class="fa fa-chevron-left" title="Previous Year"></span>
                                          </th>
                                          <th class="picker-switch" data-action="pickerSwitch" colspan="5" title="Select Year">2020</th>
                                          <th class="next" data-action="next"><span class="fa fa-chevron-right" title="Next Year"></span></th>
                                        </tr>
                                      </thead>
                                    <tbody>
                                      <tr>
                                        <td colspan="7">
                                          <span data-action="selectMonth" class="month active">Jan</span>
                                          <span data-action="selectMonth" class="month">Feb</span>
                                          <span data-action="selectMonth" class="month">Mar</span>
                                          <span data-action="selectMonth" class="month">Apr</span>
                                          <span data-action="selectMonth" class="month">May</span>
                                          <span data-action="selectMonth" class="month">Jun</span>
                                          <span data-action="selectMonth" class="month">Jul</span>
                                          <span data-action="selectMonth" class="month">Aug</span>
                                          <span data-action="selectMonth" class="month">Sep</span>
                                          <span data-action="selectMonth" class="month">Oct</span>
                                          <span data-action="selectMonth" class="month">Nov</span>
                                          <span data-action="selectMonth" class="month">Dec</span>
                                        </td>
                                      </tr>
                                    </tbody>
                                    </table>
                                    </div>
                                    <div class="datepicker-years" style="display: none;">
                                      <table class="table-condensed">
                                        <thead>
                                          <tr>
                                            <th class="prev" data-action="previous"><span class="fa fa-chevron-left" title="Previous Decade"></span></th>
                                            <th class="picker-switch" data-action="pickerSwitch" colspan="5" title="Select Decade">2020-2029</th>
                                            <th class="next" data-action="next"><span class="fa fa-chevron-right" title="Next Decade"></span></th>
                                          </tr>
                                        </thead>
                                        <tbody>
                                          <tr>
                                            <td colspan="7">
                                              <span data-action="selectYear" class="year old">2019</span>
                                              <span data-action="selectYear" class="year active">2020</span>
                                              <span data-action="selectYear" class="year">2021</span>
                                              <span data-action="selectYear" class="year">2022</span>
                                              <span data-action="selectYear" class="year">2023</span>
                                              <span data-action="selectYear" class="year">2024</span>
                                              <span data-action="selectYear" class="year">2025</span>
                                              <span data-action="selectYear" class="year">2026</span>
                                              <span data-action="selectYear" class="year">2027</span>
                                              <span data-action="selectYear" class="year">2028</span>
                                              <span data-action="selectYear" class="year">2029</span>
                                              <span data-action="selectYear" class="year old">2030</span>
                                            </td>
                                          </tr>
                                        </tbody>
                                        </table>
                                      </div>
                                      <div class="datepicker-decades" style="display: none;">
                                        <table class="table-condensed">
                                          <thead>
                                            <tr>
                                              <th class="prev" data-action="previous"><span class="fa fa-chevron-left" title="Previous Century"></span></th>
                                              <th class="picker-switch" data-action="pickerSwitch" colspan="5">2000-2090</th>
                                              <th class="next" data-action="next"><span class="fa fa-chevron-right" title="Next Century"></span></th>
                                            </tr>
                                          </thead>
                                          <tbody>
                                            <tr>
                                              <td colspan="7">
                                                <span data-action="selectDecade" class="decade old" data-selection="2006">1990</span>
                                                <span data-action="selectDecade" class="decade" data-selection="2006">2000</span>
                                                <span data-action="selectDecade" class="decade active" data-selection="2016">2010</span>
                                                <span data-action="selectDecade" class="decade" data-selection="2026">2020</span>
                                                <span data-action="selectDecade" class="decade" data-selection="2036">2030</span>
                                                <span data-action="selectDecade" class="decade" data-selection="2046">2040</span>
                                                <span data-action="selectDecade" class="decade" data-selection="2056">2050</span>
                                                <span data-action="selectDecade" class="decade" data-selection="2066">2060</span>
                                                <span data-action="selectDecade" class="decade" data-selection="2076">2070</span>
                                                <span data-action="selectDecade" class="decade" data-selection="2086">2080</span>
                                                <span data-action="selectDecade" class="decade" data-selection="2096">2090</span>
                                                <span data-action="selectDecade" class="decade old" data-selection="2106">2100</span>
                                                </td></tr></tbody></table></div></div></li><li class="picker-switch accordion-toggle"></li></ul></div></div>
                          </div>
                          <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                      </section>
                    <!-- endcalender -->


                      </div>
                    <!-- /.row -->
                  </div><!-- /.container-fluid -->
                </section>
                <!-- end Info box -->

            </div>
        </div>
    </div>
</template>

<script>
    export default {
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
