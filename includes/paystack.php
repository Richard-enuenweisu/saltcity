  <script>
  function payWithPayStack(){

    var total = document.getElementById("amount").value;

    var handler = PaystackPop.setup({
      key: 'pk_live_740756e40a5b6b6d3854a87d095b90a76455ec03',
      email: 'mysaltcity@gmail.com',
      amount: total*100,
      ref: ''+Math.floor((Math.random() * 1000000000) + 1), // generates a pseudo-unique reference. Please replace with a reference you generated. Or remove the line entirely so our API will generate one for you
      metadata: {
         custom_fields: [
            {
                display_name: "Mobile Number",
                variable_name: "mobile_number",
                value: "+2348030597015"
            }
         ]
      },
      callback: function(response){
        window.location = 'commit.php?ref=' + response.reference ;        
        // alert('success. transaction ref is ' + response.reference);
      },
      onClose: function(){
          alert('window closed');
      }
    });
    handler.openIframe();
  }
</script>