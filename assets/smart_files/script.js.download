String.prototype.replaceAll = function(search, replacement) {
  var target = this;
  return target.replace(new RegExp(search, 'g'), replacement);
};
function showTmpImgOnEL(o)
{
  if (o.input.files && o.input.files[0]) {
    var reader = new FileReader();
    reader.onload = function (e) {
      $(o.trgt).attr("src", e.target.result);
      if(o.fn){
        o.fn(e.target.result);
      }
    }
    reader.readAsDataURL(o.input.files[0]);
  }
}
function alertMessage(type, errorMsg, addiClass)
{
  $('.alert-container').remove();
  var alertClass = (type=="error" ? "alert-danger" : "alert-success" );
  var errorAlert = '<div class=\"alert-container\"><div class=\"alert '+alertClass+' '+addiClass+'\">'+errorMsg+'</div></div>';
  return errorAlert;
}
function ucFirst(str)
{
  if(str == null){ return ''}
  return str.charAt(0).toUpperCase() + str.slice(1);
}
function alphaNumericSpace(str)
{
  let letterNumber = /^[0-9a-zA-Z ]+$/;
  return str.match(letterNumber);
}