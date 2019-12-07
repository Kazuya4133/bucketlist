<?php

namespace Tests\Feature;

use App\Http\Requests\CreateTask;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Carbon\Carbon;

class TaskTest extends TestCase
{
    // テストケース毎にデータベースをリフレッシュしてマイグレーションを再実行する
    use RefreshDatabase;

    /**
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();

        // テストケース実行前にユーザーデータを作成する
        $this->seed('UsersTableSeeder');
    }

    /**
     * 期限日が日付ではない場合はバリデーションエラー
     * @test
     */
    public function due_date_should_be_date()
    {
        $response = $this->post('/user/1/tasks/create', [
            'title' => 'Sample task',
            'due_date' => 123, // 不正なデータ
        ]);

        $response->assertSessionHasErrors([
            'due_date' => '期限日 には日付を入力してください。',
        ]);
    }

    /**
     * 期限日が過去日付の場合はバリデーションエラー
     * @test
     */
    public function due_date_should_not_be_past()
    {
        $response = $this->post('/user/1/tasks/create', [
            'title' => 'Sample task',
            'due_date' => Carbon::yesterday()->format('Y/m/d'), //不正なデータ
        ]);

        $response->assertSessionHasErrors([
            'due_date' => '期限日 には今日以降の日付を入力してください。',
        ]);
    }

    /**
  * 状態が定義された値ではない場合はバリデーションエラー
  * @test
  */
  public function status_should_be_within_defined_numbers()
  {
      $this->seed('TasksTableSeeder');

      $response = $this->post('/user/1/tasks/edit', [
          'title' => 'Sample task',
          'due_date' => Carbon::today()->format('Y/m/d/'),
          'status' => 999,
      ]);

      $response->assertSessionHasErrors([
          'status' => '状態 には 未着手、着手中、達成 のいづれかを指定してください。',
      ]);
  }
}
