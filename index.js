//SETTING THE DATE AND THE TIME

const weekday = document.querySelector(".weekday");
const month = document.querySelector(".month");

const option = {
  weekday: "long"
};
const months = {
  month: "long",
  day: "numeric"
};

const today = new Date();
weekday.innerHTML = today.toLocaleDateString("en-US", option);
month.innerHTML = today.toLocaleDateString("en-US", months);

// The section that shows the time in 12 hours
function showTime() {
  var date = new Date();
  var h = date.getHours();
  var m = date.getMinutes();
  var s = date.getSeconds();
  var session = "AM";

  // if (h == 0) {
  //   h = 12;
  // }

  if (h > 12) {
    h = h - 12;
    session = "PM";
  }

  h = h < 10 ? "0" + h : h;
  m = m < 10 ? "0" + m : m;
  s = s < 10 ? "0" + s : s;

  var time = h + ":" + m + ":" + s + "" + session;
  document.getElementById("time").innerHTML = time;
  // document.getElementById("time").textContent = time;

  setTimeout(showTime, 1000);
}

showTime();




// DECLARING THE VARIABLE REMOVE
var remove = document.querySelector('.draggable');

// THE SECTION OF THE START
function dragStart(e) {
  this.style.opacity = '0.4';
  dragSrcEl = this;
  e.dataTransfer.effectAllowed = 'move';
  e.dataTransfer.setData('text/html', this.innerHTML);
};


// THE SECTION OF THE DRAG ENTER
function dragEnter(e) {
  this.classList.add('over');
}


// THE SECTION OF THE DRAG LEAVE
function dragLeave(e) {
  e.stopPropagation();
  this.classList.remove('over');
}


// THE SECTION OF THE DRAG OVER
function dragOver(e) {
  e.preventDefault();
  e.dataTransfer.dropEffect = 'move';
  return false;
}


// THE SECTION OF THE DRAG DROP
function dragDrop(e) {
  if (dragSrcEl != this) {
    dragSrcEl.innerHTML = this.innerHTML;
    this.innerHTML = e.dataTransfer.getData('text/html');
  }
  return false;
}


// THE SECTION OF THE DRAG END
function dragEnd(e) {
  var listItens = document.querySelectorAll('.draggable');
  [].forEach.call(listItens, function(item) {
    item.classList.remove('over');
  });
  this.style.opacity = '1';
}


// THE SECTION OF THE DRAG AND DROP
function addEventsDragAndDrop(el) {
  el.addEventListener('dragstart', dragStart, false);
  el.addEventListener('dragenter', dragEnter, false);
  el.addEventListener('dragover', dragOver, false);
  el.addEventListener('dragleave', dragLeave, false);
  el.addEventListener('drop', dragDrop, false);
  el.addEventListener('dragend', dragEnd, false);
}

var listItens = document.querySelectorAll('.draggable');
[].forEach.call(listItens, function(item) {
  addEventsDragAndDrop(item);
});



