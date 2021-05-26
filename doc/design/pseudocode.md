INIT adventure
Get first room by id = 1
Get paths where room_1 is equal to 1
WHILE number of paths are greater than 0
    let player chose path
    Set roomId to the value of room_2 of the chosen path
    Get next room by roomId
    Get paths where room_1 is equal to roomId
END WHILE
IF the name of the room equals "Skatten"
    The player has won
ELSE IF the name of the room equals "Game Over"
    The player has lost
END IF
