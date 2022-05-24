function addToCart(articleId){ //lägger till article i carten
    if (getCookie('cart') !== null){ //om carten inte är tom
        let cookieValueArray = getCookieValue('cart'); //hämta värdet av kakan

        let cookieValue = cookieValueArray.split('=')[0];

        cookieValue= cookieValue.concat(",", articleId); //vi separerar varor med komman (,)

        createCookie('cart', cookieValue, 10);
    }
    else {
        cookieValue = articleId;

        createCookie('cart', cookieValue, 10);
    }
}

function EmptyCart(){ //vi tar bort cart-kakan
    document.cookie = "cart=; expires=Thu, 01 Jan 1970 00:00:00 GMT;"; //ingen aning LOL Johan!

    location.reload(); //laddar om!
}

function createCookie(name, value, days) { //skapar en kaka
    var expires;
    
    if (days) {
        var date = new Date();
        date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
        expires = "; expires=" + date.toGMTString();
    }
    else {
        expires = "";
    }
    
    document.cookie = escape(name) + "=" + 
        escape(value) + expires + "; path=/";
}

function getCookie(name) { //hämtar värdet av en kaka
    var dc = document.cookie;
    var prefix = name + "=";
    var begin = dc.indexOf("; " + prefix);
    if (begin == -1) {
        begin = dc.indexOf(prefix);
        if (begin != 0) return null;
    }
    else
    {
        begin += 2;
        var end = document.cookie.indexOf(";", begin);
        if (end == -1) {
        end = dc.length;
        }
    }

    return decodeURI(dc.substring(begin + prefix.length, end));
} 

function getCookieValue(cname) { //returnerar kakans värde om den finns
    let name = cname + "=";
    let decodedCookie = decodeURIComponent(document.cookie);
    let ca = decodedCookie.split(';');
    for(let i = 0; i <ca.length; i++) {
      let c = ca[i];
      while (c.charAt(0) == ' ') {
        c = c.substring(1);
      }
      if (c.indexOf(name) == 0) {
        return c.substring(name.length, c.length);
      }
    }
    return "";
}