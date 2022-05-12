function addToCart(articleId){
    if (getCookie('cart') !== null){
        let cookieValueArray = getCookieValue('cart');

        let cookieValue = cookieValueArray.split('=')[0];

        cookieValue= cookieValue.concat(",", articleId);

        createCookie('cart', cookieValue, 10);
    }
    else {
        cookieValue = articleId;

        createCookie('cart', cookieValue, 10);
    }
}

function EmptyCart(){
    document.cookie = 'cart=; Max-Age=0; path=/; domain=' + location.host; //woooooooooo
    
    location.reload();
}

function MakePurchase(){
    
}

function createCookie(name, value, days) {
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

function getCookie(name) {
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
    // because unescape has been deprecated, replaced with decodeURI
    //return unescape(dc.substring(begin + prefix.length, end));
    return decodeURI(dc.substring(begin + prefix.length, end));
} 

function getCookieValue(cname) {
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