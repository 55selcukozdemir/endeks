const ilID = document.querySelector("#il");
const ilceDiv = document.querySelector("#ilce_div");
const ilceID = document.querySelector("#ilce");
const mahalleDiv = document.querySelector("#mahalle_div");
const mahalleID = document.querySelector("#mahalle");


function getilce (){

  // içinde değer varsa tümünü sileliyiz ki her seçenek seçtiğimizde dönbaş yapmasın.
  ilceSil();
  mahalleSil();


  if(ilID.value != '#'){
  $.ajax({
      method: "POST",
      url: "manage/getDistrict",
      data: { ilID : ilID.value},
      dataType: "html"
    }).done(function(res){
      console.log("ilce veriler")     ; 
      console.log(res)     ; 
      const obj = JSON.parse(res);
      var arrayLen = obj.length;
      for (var i = 0; i < arrayLen; i++){
        var option = document.createElement('option');
        option.value = obj[i].id;  
        option.text = obj[i].ilce_adi
        ilceID.appendChild(option);
      }       
    });
    
    ilceDiv.style.display = "flex";
  } else {
    ilceDiv.style.display = "none";
    mahalleDiv.style.display = "none";
  }
  
}

function getMahalle (){
  // içinde değer varsa tümünü sileliyiz ki her seçenek seçtiğimizde dönbaş yapmasın.
  mahalleSil();

  if(ilceID.value != '#'){
    $.ajax({
        method: "POST",
        url: "manage/getNeighbourhood",
        data: { ilceID : ilceID.value },
        dataType: "html"
      }).done(function(res){
          // json verileri kullanılabilir hale getiriyoruz
          const obj = JSON.parse(res);
          var arrayLen = obj.length;

          // verileri select'e ekliyoruz
          for (var i = 0; i < arrayLen; i++){
            var option = document.createElement('option');
            option.value = obj[i].id;  
            option.text = obj[i].mahalle_adi
            mahalleID.appendChild(option);
          }
      });
      
  // ilk başta kapalı olmasını istedim boş görünmesin diye.
  mahalleDiv.style.display = "flex";
  } else {
    mahalleDiv.style.display = "none"; 
  }
}

function mahalleSil() { 
  for (var i = 0; i < mahalleID.length; i++){
    mahalleID.remove(i+1);
  }
}

function ilceSil () { 
  for (var i = 0; i < ilceID.length; i++){
    ilceID.remove(i+1);
  }
}


