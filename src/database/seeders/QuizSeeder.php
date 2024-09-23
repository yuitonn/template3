<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Quiz; // モデルのインポート
use App\Models\Question;
use App\Models\Choice;

class QuizSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // クイズを作成
        $quiz = Quiz::create([
            'name' => 'ITクイズ',
        ]);

        // 質問1を作成
        $question1 = $quiz->questions()->create([
            'text' => '日本のIT人材が2030年には最大どれくらい不足すると言われているでしょうか？',
            'image' => '/img/quiz/img-quiz01.png',
            'supplement' => '結構多いです！',
        ]);

        // 選択肢を追加
        $question1->choices()->createMany([
            ['text' => '約79万人', 'is_correct' => false],
            ['text' => '約28万人', 'is_correct' => false],
            ['text' => '約183万人', 'is_correct' => true],
        ]);

        // 質問2を作成
        $question2 = $quiz->questions()->create([
            'text' => '既存業界のビジネスと、先進的なテクノロジーを結びつけて生まれた、新しいビジネスのことをなんと言うでしょう？',
            'image' => '/img/quiz/img-quiz02.png',
            'supplement' => '',
        ]);

        // 選択肢を追加
        $question2->choices()->createMany([
            ['text' => 'INTECH', 'is_correct' => false],
            ['text' => 'BIZZTECH', 'is_correct' => false],
            ['text' => 'X-TECH', 'is_correct' => true],
        ]);

        // 質問3を作成
        $question3 = $quiz->questions()->create([
            'text' => 'IoTとは何の略でしょう？',
            'image' => '/img/quiz/img-quiz03.png', // 画像がある場合はパスを指定
            'supplement' => '',
        ]);

        // 選択肢を追加
        $question3->choices()->createMany([
            ['text' => 'Internet of Things', 'is_correct' => true],
            ['text' => 'Information on Tool', 'is_correct' => false],
            ['text' => 'Integrate into Technology', 'is_correct' => false],
        ]);
    }
}
