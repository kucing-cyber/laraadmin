<template>
  <div class="container-fluid">
    <div class="row justify-content-center">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">
            <div class="card-tools">
              <button class="btn btn-sm btn-outline-success" @click="addAlumni()">
              <i class="fa fa-user-plus">&nbsp;Tambah</i></button>
              <button class="btn btn-sm btn-outline-info" @click="addRombel()">
              <i class="fa fa-user-plus">&nbsp;BY ROMBEL</i></button>
            </div>
          </div>

          <div class="card-body" >
            <div class="table-responsive-xl">
              <!-- <table class="table table-hover table-sm">
                <caption>Data Alumni {{ siswas.to }} dari {{ siswas.total }}</caption>
                <thead>
                  <tr>
                    <th></th>
                    <th>NAMA</th>
                    <th>NIPD</th>
                    <th>NISN</th>
                    <th>TEMPAT LAHIR</th>
                    <th>TANGGAL LAHIR</th>
                    <th>TAHUN MASUK</th>
                    <th>TAHUN LULUS</th>
                  </tr>
                </thead>
                <tbody>
                  <tr v-for="(siswa,index) in siswas.data" @click="siswaList()" :key="index">
                    <td><input type="checkbox" id="index" v-model="selected" aria-label="Checkbox" :value="siswa"></td>
                    <td>{{ siswa.nama }}</td>
                    <td>{{ siswa.NIPD }}</td>
                    <td>{{ siswa.NISN }}</td>
                    <td>{{ siswa.tempat_lahir }}</td>
                    <td>{{ siswa.tgl_lahir }}</td>
                    <td>{{ siswa.Tahun_Ajaran }}</td>
                    <td></td>
                    
                  </tr>
                </tbody>
              </table> -->

            </div>
          </div>

          <!-- modal -->
          <div class="modal fade bd-example-modal-lg" id="tambah" tabindex="-1" role="dialog" aria-labelledby="tambahLabel" aria-hidden="true">
          <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="tambahLabel">LULUSKAN ROMBEL</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
              <div class="modal-body">
                <div class="form-group">
                  <select v-model="rombel" class="custom-select">
                    <option v-for="item in rombels.data" :value="item.id_rombel" :key="item.id_rombel">{{item.nama_rombel}}</option>
                  </select>
                </div>
                <div class="form-group float-right">
                  <button class="btn btn-sm btn-success"><i class="fa fa-user-graduate">&nbsp;LULUSKAN</i></button>
                </div>
              </div>
            </div>
          </div>
          </div>


        </div>
      </div>
    </div>
  </div>
</template>

<script>
  export default {
    data(){
      return{
        siswas:{},
        thn_lulus:'', 
        selected: [],
        rombels:{},
        rombel:{},

      }
    },
    

    methods: {
      addRombel(){
        console.log('trigered');
        axios.get("api/rombel").then(({data}) => (this.rombels = data));
        $('#tambah').modal('show');
      },

      addAlumni(){
        console.log('trigered');
        axios.post('api/alumni', this.selected)
      },

      siswaList(){
        $('.table tr').click(function (event) {
        if (event.target.type !== 'checkbox') {
          $(':checkbox', this).trigger('click');
          }
        });
      },
      
      loaddata(){
        axios.get('api/alumni').then(({data}) => (this.siswas = data));
      },
       
      },
    mounted() {
      this.loaddata();
      
    }
  }
</script>
