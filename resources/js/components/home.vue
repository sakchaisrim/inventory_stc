
<template>
	<div>
	<div class="mb-4 d-sm-flex align-items-center justify-content-between">
            <h1 class="mb-0 text-gray-800 h3">Dashboard:</h1>
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="./">Home</a></li>
              <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
            </ol>
          </div>

          <div class="mb-3 row">
            <!-- Earnings (Monthly) Card Example -->
            <div class="mb-4 col-xl-3 col-md-6">
              <div class="card h-100">
                <div class="card-body">
                  <div class="row align-items-center">
                    <div class="mr-2 col">
        <div class="mb-1 text-xs font-weight-bold text-uppercase">Today Sell Amount </div>
 <div class="mb-0 text-gray-800 h5 font-weight-bold"> {{ todaysell }} บาท</div>
                      <div class="mt-2 mb-0 text-xs text-muted">
                        <span class="mr-2 text-success"><i class="fa fa-arrow-up"></i> 3.48%</span>
                        <span>Since last month</span>
                      </div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-calendar fa-2x text-primary"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- Earnings (Annual) Card Example -->
            <div class="mb-4 col-xl-3 col-md-6">
              <div class="card h-100">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="mr-2 col">
                      <div class="mb-1 text-xs font-weight-bold text-uppercase">Today Income</div>
        <div class="mb-0 text-gray-800 h5 font-weight-bold">฿ {{ income }} </div>
                      <div class="mt-2 mb-0 text-xs text-muted">
                        <span class="mr-2 text-success"><i class="fas fa-arrow-up"></i> 12%</span>
                        <span>Since last years</span>
                      </div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-shopping-cart fa-2x text-success"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- New User Card Example -->
            <div class="mb-4 col-xl-3 col-md-6">
              <div class="card h-100">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="mr-2 col">
   <div class="mb-1 text-xs font-weight-bold text-uppercase">Today Due</div>
      <div class="mb-0 mr-3 text-gray-800 h5 font-weight-bold">฿ {{ due }} </div>
                      <div class="mt-2 mb-0 text-xs text-muted">
                        <span class="mr-2 text-success"><i class="fas fa-arrow-up"></i> 20.4%</span>
                        <span>Since last month</span>
                      </div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-users fa-2x text-info"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- Pending Requests Card Example -->
            <div class="mb-4 col-xl-3 col-md-6">
              <div class="card h-100">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="mr-2 col">
  <div class="mb-1 text-xs font-weight-bold text-uppercase">Today Expense</div>
    <div class="mb-0 text-gray-800 h5 font-weight-bold">฿ {{ expense }} </div>
                      <div class="mt-2 mb-0 text-xs text-muted">
                        <span class="mr-2 text-danger"><i class="fas fa-arrow-down"></i> 1.10%</span>
                        <span>Since yesterday</span>
                      </div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-comments fa-2x text-warning"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            
          <div class="mb-4 col-lg-12">
              <!-- Simple Tables -->
              <div class="card">
                <div class="flex-row py-3 card-header d-flex align-items-center justify-content-between">
       <h6 class="m-0 font-weight-bold text-primary">Out Of Stock Product</h6>
                </div>
                <div class="table-responsive">
                  <table class="table align-items-center table-flush">
                    <thead class="thead-light">
                      <tr>
                        <th>Name</th>
                        <th>Code</th>
                        <th>Photo</th>
                         
                        <th>Buying Price</th>
                        <th>Status</th>
                        <th>Quantity</th>
                        
                      </tr>
                    </thead>
                    <tbody>
                      <tr v-for="product in products" :key="product.id">
                        <td> {{ product.product_name }} </td>
                        <td> {{ product.product_code }} </td>
                        <td><img :src="product.image" id="em_photo"></td>
                        
                        <td>{{ product.buying_price }}</td>
  <td v-if="product.product_quantity  >= 1 "><span class="badge badge-success">Available </span></td>
   <td v-else=" "><span class="badge badge-danger">Stock Out </span></td>
                         <td>{{ product.product_quantity }}</td>
             
                      </tr>
                    
                    </tbody>
                  </table>
                </div>
                <div class="card-footer"></div>
              </div>
            </div>





          </div>
          <!--Row--> 
	</div>

</template>



<script type="text/javascript">
  
  export default {
    created(){
      if (!User.loggedIn()) {
        this.$router.push({name: '/'})
      }
    },

 data(){
  return{
    todaysell:'',
    income:'',
    due:'',
    expense:'',
    products:''
  }

 },
 mounted(){
 this.TodaySell();
 this.TodayIncome();
 this.TodayDue();
 this.TodayExpense();
 this.StockOut();
 },
  methods:{
     TodaySell(){
      axios.get('/api/today/sell')
        .then(({data}) => (this.todaysell = data))
        .catch()
     },
     TodayIncome(){
      axios.get('/api/today/income')
        .then(({data}) => (this.income = data))
        .catch()
     },
     TodayDue(){
      axios.get('/api/today/due')
        .then(({data}) => (this.due = data))
        .catch()
     },
     TodayExpense(){
      axios.get('/api/today/expense')
        .then(({data}) => (this.expense = data))
        .catch()
     },

     StockOut(){
      axios.get('/api/today/stockout')
        .then(({data}) => (this.products = data))
        .catch()
     },

   }

  } 
</script>


<style type="text/css">
	
</style>