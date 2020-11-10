<?php
/**
 * Created by PhpStorm.
 * User: dungduong
 * Date: 10/27/2018
 * Time: 6:20 PM
 */

class TennisGame
{
    public $score = '';
    const POINT0 = 0;
    const POINT15 = 15;
    const POINT30 = 30;
    const POINT40 = 40;


    public function getScore($Player1Score, $Player2Core)
    {
        if ($Player1Score == $Player2Core) {
            $this->ScoreEqual($Player1Score, $Player2Core);
        } else if ($Player1Score >= 4 || $Player2Core >= 4) {
            $this->PlayerAdvantage($Player1Score, $Player2Core);
        } else {
            $this->ScoreDifferent($Player1Score, $Player2Core);
        }
    }

    public function ScoreDifferent($Player1Score, $Player2Core)
    {
        for ($i = 1; $i < 3; $i++) {
            if ($i == 1) $tempScore = $Player1Score;
            else {
                $this->score .= "-";
                $tempScore = $Player2Core;
            }
            switch ($tempScore) {
                case self::POINT0:
                    $this->score .= "Love";
                    break;
                case self::POINT15:
                    $this->score .= "Fifteen";
                    break;
                case self::POINT30:
                    $this->score .= "Thirty";
                    break;
                case self::POINT40:
                    $this->score .= "Forty";
                    break;
            }
        }
    }

    public function PlayerAdvantage($Player1Score, $Player2Core)
    {
        $minusResult = $Player1Score - $Player2Core;
        if ($minusResult == 1) $this->score = "Advantage player1";
        else if ($minusResult == -1) $this->score = "Advantage player2";
        else if ($minusResult >= 2) $this->score = "Win for player1";
        else $this->score = "Win for player2";
    }

    public function ScoreEqual($Player1Score, $Player2Score)
    {
        switch ($Player1Score) {
            case self::POINT0:
                $this->score = "Love-All";
                break;
            case self::POINT15:
                $this->score = "Fifteen-All";
                break;
            case self::POINT30:
                $this->score = "Thirty-All";
                break;
            case self::POINT40:
                $this->score = "Forty-All";
                break;
            default:
                $this->score = "Deuce";
                break;
        }
    }

    public function __toString()
    {
        return $this->score;
    }
}