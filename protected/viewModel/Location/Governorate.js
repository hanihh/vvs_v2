/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$.getScript("../Base.js", function(){});

var Governorate = Base.extend({
    init: function(id, code, ar_name, en_name) {    
        this.id = id;
        this.ar_name = ar_name;
        this.en_name = en_name;
        this.code = code;
        this.country = "";               
        this.districts = [];
    },
    parse: function(data){
            var governorate = new Governorate();
            
            var jsonObj = JSON.parse(data);    
            governorate.id = jsonObj.id;
            governorate.en_name = jsonObj.en_name;
            governorate.ar_name = jsonObj.ar_name;
            governorate.code = jsonObj.code;
            governorate.country = jsonObj.country;
            
            foreach (x in jsonObj.districts)
            {
                var district = new District();           
                governorate.districts.append(district.parse(x));
            }
            
            return governorate;
    }
});
