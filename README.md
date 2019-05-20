[![Build Status](https://travis-ci.org/daanmooij/domino.svg?branch=master)](https://travis-ci.org/daanmooij/domino)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/daanmooij/domino/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/daanmooij/domino/?branch=master)

# Domino
Library to play domino

## Entities
- Board
- DominoException
- Game
- Logger
- Player
- Stock
- Tile

## Installation

```bash
make install
```

## Testing

To run all the tests, run:
```bash
make test
```

To either run only the unit or integration tests, run:
```bash
make unit
make integration
```

## Example

To run an example:
```bash
make example
```

A game could look like this:
```bash

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
