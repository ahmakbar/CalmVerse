const flashcards = document.getElementsByClassName("flashcards")[0];
const createBox = document.getElementsByClassName("create-box")[0];
const title = document.getElementById("title");
const quotes = document.getElementById("quotes");

let contentArray = localStorage.getItem('items') ? JSON.parse(localStorage.getItem('items')) : [];

contentArray.forEach(divMaker);
function divMaker(text) {
    var div = document.createElement("div");
    var h2_title = document.createElement("h2");
    var h2_quotes = document.createElement("h2");

    div.className = 'flashcard';

    h2_title.setAttribute('style', "border-top:1px solid red; padding: 15px; margin-top: 30px;");

    h2_title.innerHTML = text.my_title;
    
    h2_quotes.setAttribute('style', "text-align: center; display: none; color: red; transition: .2s all ease-in-out;");
    
    h2_quotes.innerHTML = text.my_quotes;

    div.appendChild(h2_title);
    div.appendChild(h2_quotes);

    div.addEventListener("click", function() {
        if (h2_quotes.style.display == "none") 
        h2_quotes.style.display = "block";
        else 
        h2_quotes.style.display = "none";

    });

    flashcards.appendChild(div);
     
}


function addFlashcard() {
    var flashcard_info = {
        'my_title' : title.value,
        'my_quotes' : quotes.value
    }

    contentArray.push(flashcard_info);
    localStorage.setItem('items', JSON.stringify(contentArray));
    divMaker(contentArray[contentArray.length - 1]);
    title.value = '';
    quotes.value = '';
}

function delFlashcards() {
    localStorage.clear();
    flashcards.innerHTML = '';
    contentArray = [];
}

function showCreateCardBox() {
    createBox.style.display = "block";
}

function hideCreateBox() {
    createBox.style.display = "none";
}
