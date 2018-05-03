goToLink = link => {
  window.location = link;
};

simpleCart({
  checkout: {
    type: "SendForm",
    url: "../checkout.php"
    // type: "GoogleCheckout",
    // marchantID: "XXXXXXXXX"
  }
});
simpleCart.currency({
  code: "UAH",
  name: "Ukrainian Hryvnya",
  symbol: " ₴",
  delimiter: " ",
  decimal: ",",
  after: true,
  accuracy: 2
});
