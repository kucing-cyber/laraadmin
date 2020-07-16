<template>
  <div class="container-fluid">
    <div class="row justify-content-center">
      <div class="col-md-12">
        <div class="row">
        <!-- test -->
        <div class="card-body">
            <select v-model="pelajaran" @change="loadmapel()" class="custom-select">
                <option v-for="item in mapel" :value="item.id" :key="item.id">{{item.nama}}</option>
            </select>
            <div class="container">
              <ul v-for="(rombel, index) in soal.data" :key="index" >
                <p>{{index + 1}}<span v-html="rombel.deskripsi"></span></p>
                <p><span v-html="rombel.pilihan_a"></span></p>
                <p><span v-html="rombel.pilihan_b"></span></p>
                <p><span v-html="rombel.pilihan_c"></span></p>
                <p><span v-html="rombel.pilihan_d"></span></p>
                <p><span v-html="rombel.pilihan_e"></span></p>
                <p>KUNCI : {{rombel.kunci_jawaban | Upper}}</p>
              </ul>
            </div>
        </div>
        <!-- endtest -->
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
                mapel:{},
                pelajaran:{},
                soal:{},
            }
        },

        methods:{

        loadmapel(){
            axios.get('api/ujianloadsoal?id=' + this.pelajaran).then((data) => (this.soal = data));
        },
        loadSOAL(){
            axios.get("api/ujiansoal").then(({ data }) => (this.mapel = data));
        }
        },
        mounted() {
            this.loadSOAL();
            //console.log('Component mounted.')
        }
    }
</script>
