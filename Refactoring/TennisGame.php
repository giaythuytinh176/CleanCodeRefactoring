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

    public function getScore($player1Score, $player2Score)
    {
        if ($player1Score == $player2Score) {
            $this->ScoreEqual($player1Score);
        } else if ($player1Score >= 4 || $player2Score >= 4) {
            $this->PlayerAdvantage($player1Score, $player2Score);
        } else {
            $this->ScoreDifferent($player1Score, $player2Score);
        }
    }

    public function ScoreDifferent($player1Score, $player2Score)
    {
        for ($PointCount = 1; $PointCount < 3; $PointCount++) {
            if ($PointCount == 1) $tempScore = $player1Score;
            else {
                $this->score .= "-";
                $tempScore = $player2Score;
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

    public function PlayerAdvantage($player1Score, $player2Score)
    {
        $minusResult = $player1Score - $player2Score;
        if ($minusResult == 1) $this->score = "Advantage player1";
        else if ($minusResult == -1) $this->score = "Advantage player2";
        else if ($minusResult >= 2) $this->score = "Win for player1";
        else $this->score = "Win for player2";
    }

    public function ScoreEqual($player1Score)
    {
        switch ($player1Score) {
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