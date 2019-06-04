window.onscroll = function() {scrollFunction()};

function scrollFunction() {
  if (document.body.scrollTop > 80 || document.documentElement.scrollTop > 80) {
    document.getElementById("wrapper--top").style.top = "-97px";
    document.getElementById("wrapper--top").style.borderBottom = "3px solid RebeccaPurple ";
  } else {
    document.getElementById("wrapper--top").style.top = "0px";
    document.getElementById("wrapper--top").style.borderBottom = "3px solid transparent";
  }
}