@extends('layouts.app')

@section('content')
    
    @if ($search->hits > 0) 
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <h2>&quot;<?php print htmlspecialchars($title, ENT_QUOTES, "UTF-8"); ?>&quot;の検索結果一覧</h2>
                        <table class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th class="text-center">画像</th>
                                    <th class="text-center">商品名</th>
                                    <th class="text-center">詳細</th>
                                    <th class=""></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($search->Items as $item) { ?>
                                    <tr>
                                        <td class="text-center">
                                            <img src='<?php print htmlspecialchars($item->Item->mediumImageUrl, ENT_QUOTES, "UTF-8"); ?>' />
                                        </td>
                                        <td class="">
                                            <a href="<?php print htmlspecialchars($item->Item->itemUrl, ENT_QUOTES, "UTF-8"); ?>" target="_blank">
                                                <?php print htmlspecialchars($item->Item->title, ENT_QUOTES, "UTF-8"); ?>
                                            </a>
                                        </td>
                                        <td class="">
                                            <?php print htmlspecialchars($item->Item->itemCaption, ENT_QUOTES, "UTF-8"); ?>
                                        </td>
                                        <td class="">
                                            {!! link_to_route('developments.create', '投稿を作成する', [], ['class' => 'btn btn-primary']) !!}
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div> 
             @else 
                <p>検索結果はありません</p>
            
            @endif
@endsection