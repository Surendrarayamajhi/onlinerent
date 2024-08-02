const textList = ["Renting made Easy...", "Renting made Fast...", "Renting made Convenient...", "Renting made Awesome..."];
const speed = 100; // Adjust this value to change the typing speed
const initialDelay = 2000; // Adjust this value to set the initial delay

let index = 0;
let i = 0;
let words = textList[index].split(" ");
let lastTwoWords = words.slice(-2).join(" ");

function typeLastTwoWords() {
  if (i < lastTwoWords.length) {
    document.getElementById("typing-effect").textContent = textList[index].slice(0, -(lastTwoWords.length)) + lastTwoWords.slice(0, i + 1);
    i++;
    setTimeout(typeLastTwoWords, speed);
  } else {
    i = 0;
    index = (index + 1) % textList.length;
    words = textList[index].split(" ");
    lastTwoWords = words.slice(-2).join(" ");
    setTimeout(typeLastTwoWords, 2000); // Wait for 2 seconds before typing the next text
  }
}

// Adding an initial delay before starting the animation
setTimeout(typeLastTwoWords, initialDelay);
