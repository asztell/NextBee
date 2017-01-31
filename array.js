'use strict';

var array = [1, 3, 5, 7, 9, 6, 4, 2, 5, 7, 12, 11, 45, 46, 22, 65];
var max = getMax(array);
var max2 = undefined;
var sum = undefined;
var solution = '';

function splice_it(arr, max) {
  var index = arr.indexOf(max);
  return arr.splice(index, 1);
}


function getMax(arr) {
  return Math.max.apply(null, arr);
}

//console.log(max);

//console.log(array);
splice_it(array, max);
//console.log(array);


for(var i = 0; i < array.length; i++){
  max2 =  getMax(array);
  if(((max+max2) % 2) == 0){
    sum = max+max2;
    solution =
      "array = [1, 3, 5, 7, 9, 6, 4, 2, 5, 7, 12, 11, 45, 46, 22, 65]\n"
      +"The largest even number that is the sum of two array elements is "+sum
      +", it's augend and addend values are the array values "+max+" and "+max2+".";
    console.log(solution);
    break;
  } else {
    splice_it(array, max2);
  }
}