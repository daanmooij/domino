[![Build Status](https://travis-ci.org/daanmooij/domino.svg?branch=master)](https://travis-ci.org/daanmooij/domino)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/daanmooij/domino/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/daanmooij/domino/?branch=master)

# Domino
Library to play domino.

Dominoes is a family of games played with rectangular tiles.
Each tile is divided into two square ends.
Each end is marked with a number (one to six) of spots or is a blank.
There are 28 tiles, one for each combination of spots and blanks.

**Rules of the game:**
- The 28 tiles are shuffled face down and form the stock. Each player draws seven tiles.
- Pick a random tile to start the line of play.
- The players alternately extend the line of play with one tile at one of its two ends;
- A tile may only be placed next to another tile, if their respective values on the connecting ends are identical.
- If a player is unable to place a valid tile, they must keep on pulling tiles from the stock until they can.
- The game ends when one player wins by playing their last tile or when the stock is empty.

## Installation

```
make install
```

## Testing

To run all the tests, run:
```
make test
```

To either run only the unit or integration tests, run:
```
make unit
make integration
```

## Example

To run an example:
```
make example
```

A game could look like this:
```

-------------------------------------------------------
Game starting with tile: <1:4>
Alice plays <4:2> to connect to tile <1:4> on the board
Board is now: <1:4> <4:2>
Bob plays <2:5> to connect to tile <4:2> on the board
Board is now: <1:4> <4:2> <2:5>
Alice plays <0:1> to connect to tile <1:4> on the board
Board is now: <0:1> <1:4> <4:2> <2:5>
Bob plays <5:1> to connect to tile <2:5> on the board
Board is now: <0:1> <1:4> <4:2> <2:5> <5:1>
Alice plays <6:0> to connect to tile <0:1> on the board
Board is now: <6:0> <0:1> <1:4> <4:2> <2:5> <5:1>
Bob plays <1:1> to connect to tile <5:1> on the board
Board is now: <6:0> <0:1> <1:4> <4:2> <2:5> <5:1> <1:1>
Alice plays <1:2> to connect to tile <1:1> on the board
Board is now: <6:0> <0:1> <1:4> <4:2> <2:5> <5:1> <1:1> <1:2>
Bob plays <4:6> to connect to tile <6:0> on the board
Board is now: <4:6> <6:0> <0:1> <1:4> <4:2> <2:5> <5:1> <1:1> <1:2>
Alice plays <5:4> to connect to tile <4:6> on the board
Board is now: <5:4> <4:6> <6:0> <0:1> <1:4> <4:2> <2:5> <5:1> <1:1> <1:2>
Bob can't play, drawing tile <5:5>
Bob plays <5:5> to connect to tile <5:4> on the board
Board is now: <5:5> <5:4> <4:6> <6:0> <0:1> <1:4> <4:2> <2:5> <5:1> <1:1> <1:2>
Alice plays <2:0> to connect to tile <1:2> on the board
Board is now: <5:5> <5:4> <4:6> <6:0> <0:1> <1:4> <4:2> <2:5> <5:1> <1:1> <1:2> <2:0>
Bob plays <0:3> to connect to tile <2:0> on the board
Board is now: <5:5> <5:4> <4:6> <6:0> <0:1> <1:4> <4:2> <2:5> <5:1> <1:1> <1:2> <2:0> <0:3>
Alice plays <3:3> to connect to tile <0:3> on the board
Board is now: <5:5> <5:4> <4:6> <6:0> <0:1> <1:4> <4:2> <2:5> <5:1> <1:1> <1:2> <2:0> <0:3> <3:3>
Player Alice has won!
-------------------------------------------------------

```

## License

[MIT](LICENSE)
