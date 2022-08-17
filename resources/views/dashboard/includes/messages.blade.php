      
    @if (session('error'))
    <div class="contanier">
   <p></p>
               <div class="alert alert-danger">
                   {{ session('error') }}
               </div>
    </div>
               @endif
   
   
    @if (session('status'))
    <div class="contanier">
   
               <div class="alert alert-success">
                   {{ session('status') }}
               </div>
    </div>
               @endif