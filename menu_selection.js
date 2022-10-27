function calculatePrice() {
  var screwdriverPrice = 2.0;
  var boltsnutsPrice = 2.0;
  var shurikenPrice = 8.0;
  var hammerPrice = 5;
  var sawPrice = 3;
  var drillPrice = 3;
  var taserPrice = 2;
  var solderPrice = 5

  var javaQty = document.getElementById('javaQty');
  var cafeQty = document.getElementById('cafeQty');
  var cappuccinoQty = document.getElementById('cappuccinoQty');

  var totalPrice = 0;

  var javaTotalPrice = javaQty.value * javaPrice;
  document.getElementById("javaTotalPrice").value = javaTotalPrice;
  // console.log('justJavaTotalPrice', javaTotalPrice);

  // Check for cafe single 
  if (document.getElementById('cafeSingle').checked) {
      var cafeTotalPrice = cafeQty.value * cafePriceSingle;
      document.getElementById("cafeTotalPrice").value = cafeTotalPrice;
      // console.log('cafeTotalPrice', cafeTotalPrice);
  }

  // Check for cafe au lait double
  if (document.getElementById('cafeDouble').checked) {
      var cafeTotalPrice = cafeQty.value * cafePriceDouble;
      document.getElementById("cafeTotalPrice").value = cafeTotalPrice;
      // console.log('cafeTotalPrice', cafeTotalPrice);
  }

  // Check for iced cappunccino single
  if (document.getElementById('cappuccinoSingle').checked) {
      var cappuccinoTotalPrice = cappuccinoQty.value * cappuccinoPriceSingle;
      document.getElementById("cappuccinoTotalPrice").value = cappuccinoTotalPrice;
      // console.log('cappuccinoTotalPrice', cappuccinoTotalPrice);
  }

  if (document.getElementById('cappuccinoDouble').checked) {
      var cappuccinoTotalPrice = cappuccinoQty.value * cappuccinoPriceDouble;
      document.getElementById("cappuccinoTotalPrice").value = cappuccinoTotalPrice;
      // console.log('cappuccinoTotalPrice', cappuccinoTotalPrice);
  }
  

  // Calculate total price
  totalPrice = javaTotalPrice + cafeTotalPrice + cappuccinoTotalPrice;
  // console.log(totalPrice);
  document.getElementById("totalPrice").value = totalPrice;
  return totalPrice;
}