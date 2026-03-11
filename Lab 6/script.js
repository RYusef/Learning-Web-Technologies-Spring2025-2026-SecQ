const cells = document.querySelectorAll('.cell');
const statusEl = document.getElementById('status');
const resetBtn = document.getElementById('reset');

const WINS = [
  [0, 1, 2], 
  [3, 4, 5], 
  [6, 7, 8], 
  [0, 3, 6], 
  [1, 4, 7], 
  [2, 5, 8], 
  [0, 4, 8], 
  [2, 4, 6]
];

let board = ['', '', '', '', '', '', '', '', ''];
let currentPlayer = 'X';
let gameOver = false;
let scores = { X: 0, O: 0, D: 0 };

cells.forEach(function(cell) {
  cell.addEventListener('click', function() {

    let index = cell.dataset.index;

    if (board[index] != '' || gameOver) {
      return;
    }

    board[index] = currentPlayer;
    cell.textContent = currentPlayer;
    cell.classList.add(currentPlayer.toLowerCase());

    let winCombo = getWinningCombo();

    if (winCombo) {
      winCombo.forEach(function(i) {
        cells[i].classList.add('win');
      });
      statusEl.textContent = 'Player ' + currentPlayer + ' wins! 🎉';
      scores[currentPlayer] = scores[currentPlayer] + 1;
      updateScores();
      gameOver = true;
    } 
    
    else if (board.every(function(cell) { return cell != ''; })) {
      statusEl.textContent = "It's a draw!";
      scores.D = scores.D + 1;
      updateScores();
      gameOver = true;
    } 
    
    else {
      if (currentPlayer == 'X') {
        currentPlayer = 'O';
      } else {
        currentPlayer = 'X';
      }
      statusEl.textContent = 'Player ' + currentPlayer + "'s turn";
    }
  });
});


function getWinningCombo() {
  for (let i = 0; i < WINS.length; i++) {
    let a = WINS[i][0];
    let b = WINS[i][1];
    let c = WINS[i][2];

    if (board[a] != '' && board[a] == board[b] && board[a] == board[c]) {
      return WINS[i];
    }
  }
  return null;
}

function updateScores() {
  document.getElementById('sx').textContent = scores.X;
  document.getElementById('so').textContent = scores.O;
  document.getElementById('sd').textContent = scores.D;
}

resetBtn.addEventListener('click', function() {

  board = ['', '', '', '', '', '', '', '', ''];
  currentPlayer = 'X';
  gameOver = false;
  statusEl.textContent = "Player X's turn";

  cells.forEach(function(cell) {
    cell.textContent = '';
    cell.className = 'cell';
  });
});