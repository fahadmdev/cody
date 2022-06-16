<?php declare(strict_types=1);

namespace HighScores;

use Countable;

/**
 * Your task is to build a high-score component of the classic Frogger game, one of the highest selling and addictive
 * games of all time, and a classic of the arcade era.
 */
class HighScoresList implements Countable
{
    /**
     * @var array
     */
    protected $list;

    /**
     * HighScoresList constructor.
     *
     * @param array $scores
     */
    public function __construct(array $scores = [])
    {
        foreach ($scores as $score) {
            $this->add($score);
        }
    }

    /**
     * Adds a score to the HighScoresList.
     *
     * @param array $score
     *
     * @return void
     */
    public function add($score): void
    {
        // TODO
        array_push($this->list, $score);
    }

    public function count()
    {
        return count($this->list);
    }

    /**
     * Returns the highest score.
     *
     * @return int
     */
    public function highestScore(): int
    {
        // TODO

        return max($this->list);
    }

    /**
     * Returns the most recently added score.
     *
     * @return int
     */
    public function lastAdded(): int
    {
        // TODO

        return end($this->list);
    }

    /**
     * Returns an array containing the top three scores, beginning with the highest.
     *
     * @return array
     */
    public function topThree(): array
    {
        // TODO
        rsort($this->list);
        $top3 = array_slice($this->list, 0, 3);
        $topThree = array();
        foreach ($top3 as $key => $val) {
            $topThree[$key] = $val;
        }
        return $topThree;
    }

    /**
     * Returns an array containing the top five scores, beginning with the highest.
     *
     * @return array
     */
    public function topFive(): array
    {
        // TODO
        rsort($this->list);
        $top5 = array_slice($this->list, 0, 5);
        $topFive = array();
        foreach ($top5 as $key => $val) {
            $topFive[$key] = $val;
        }
        
        return $topFive;
    }
}
