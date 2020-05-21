window.onscroll = function topNavStyleChange() {

  var scrollTop = document.documentElement.scrollTop;
  var topNavStyle = document.getElementById('TopNav').style;

  if (scrollTop >= 77) {
    topNavStyle.color = "#000";
    topNavStyle.background = "#ed871e";
  } else {
    topNavStyle.color = "#fff";
    topNavStyle.background = "#111";
  }
}
