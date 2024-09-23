<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Quiz;
use App\Models\Question;
use App\Models\Choice;

class YmQuizSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        {
            // ymクイズを作成
            $quiz = Quiz::create([
                'name' => 'YMクイズ',
            ]);
    
            // 質問1を作成
            $question1 = $quiz->questions()->create([
                'text' => 'これはYMクイズの質問1です。',
                'image' => '/img/quiz/img-quiz01.png',
                'supplement' => '質問1の補足です。',
            ]);
    
            // 選択肢を追加
            $question1->choices()->createMany([
                ['text' => '選択肢1', 'is_correct' => false],
                ['text' => '選択肢2', 'is_correct' => true],
                ['text' => '選択肢3', 'is_correct' => false],
            ]);
    
            // 質問2を作成
            $question2 = $quiz->questions()->create([
                'text' => 'これはYMクイズの質問2です。',
                'image' => '/img/quiz/img-quiz02.png',
                'supplement' => '',
            ]);
    
            // 選択肢を追加
            $question2->choices()->createMany([
                ['text' => '選択肢1', 'is_correct' => false],
                ['text' => '選択肢2', 'is_correct' => true],
                ['text' => '選択肢3', 'is_correct' => false],
            ]);
        }
    }
}
