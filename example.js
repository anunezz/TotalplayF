//i Con esta bandera, la búsqueda no distingue entre mayúsculas y minúsculas: no hay diferencia entre A y a (consulte el ejemplo a continuación).
//g Con esta bandera, la búsqueda encuentra todas las coincidencias, sin ella, solo se devuelve la primera coincidencia..
//m Modo multilínea (cubierto en el capítulo Modo multilínea de anclas ^ $, bandera 'm').
let val ='string2121';
let exp = new RegExp(/(\d)/, 'igm');
let t = val.match(exp);

console.log("valor: ",t.join(""));

//console.log(val.split(exp));
