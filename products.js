function first()
{
    const size_div = document.getElementById('size_div');
    const furniture_div = document.getElementById('furniture_div');
    const book_div = document.getElementById('book_div');
    size_div.style.display = 'none';
    furniture_div.style.display = 'none';
    book_div.style.display = 'none';
}


function products() 
{
    var x = document.getElementById("productType").value;
    document.getElementById("result").innerHTML =  x;
    if(x == "DVD")
    {
        size_div.style.display = 'block';
        furniture_div.style.display = 'none';
        book_div.style.display = 'none';
    }
    else if (x == "book")
    {
        book_div.style.display = 'block';
        size_div.style.display = 'none';
        furniture_div.style.display = 'none';
    }
    else if (x == "furniture")
    {
        furniture_div.style.display = 'block';
        book_div.style.display = 'none';
        size_div.style.display = 'none';
    }

}

