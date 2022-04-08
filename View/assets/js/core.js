
function query (querySelector) { return document.querySelector (querySelector) }

function handleActive (val) {
  if(query(".menu .active")) query(".menu .active").classList.remove("active")
  if(query(".menu ."+val)) query(".menu ."+val).classList.add("active")
}