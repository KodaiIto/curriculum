<?php
echo "＜IT用語　エンジニアになって困らないための基本用語＞" . '<br>' . '<br>';
echo "1.IDE（統合開発環境)" . '<br>';
echo "プログラミングの際、ソースコードを書くところデバッグ、そしてコンパイラまでを一つのソフトウェアで
開発したいという要望があるでしょう。そんな時、エンジニアは統合開発環境を使うことが多いです。
元来はシステム開発は、テキストエディタでソースコードを書き、コマンドライン上でコンパイルコマンド
を叩く、という、やや不便な環境で開発を行っていました。
デバッグするならデバッガ。コンパイルするなら、コンパイラとバラバラのソフト必要。
開発に必要なツールを全てバラバラに揃え、パラパラに使わないといけなかったのです。
しかし、現在は違います。サーバーサイトのコーディングだけではなく、GUIの開発など、
ITエンジニアに求められる仕事は増大。プロジェクト管理の難易度も上がり、ITサービス開発
の負担は格段に大きくなっています。
ですので、その負担を軽減しようという開発環境が出てきているのです。
その中の一つがテキストエディタ、コンパイラ、デバッガを一つにまとめた「IDE」です。
IDEを日本語に訳すと、統合開発環境となります。
Webシステムやサービス、スマートフォンアプリなど、現在の統合開発環境、様々なITシステムや
プログラミング言語に対応しています。
統合開発環境には、様々な種類が存在します。どの統合開発環境を選ぶかによって、
厳密にはできることは違います。
特に大型の案件になればなるほど、ソースコードなどのリソース管理が大変になっていきます。
従って、現在のIT企業の開発では、IDEを利用するのが一般的になっています。
ソースコードのバージョン管理やファイルの構成管理などは、統合開発環境の登場以前と以後で、
大きく効率が変わった一つの例と言えるでしょう。
IDEは、アプリケーション開発に必要なソフトウェアをまとめて一つにして提供するパッケージです。
IDEとフレームワークの違いを見ていくと、
フレームワークとは、アプリケーション開発における雛形の役割を担います。
フレームワークは開発の際に必要とされる機能を、まとめて提供します。
アプリケーションの全体の処理の流れを、分かりやすくクリアーに管理することができるの
がフレームワークのメリットです。
例えば、Webアプリケーション開発向けフレームワークの代表例である「Ruby on Rails」
ではデザインパターンである「MVC（Model View Controller)」を導入。
" . '<br>' . '<br>';
echo "2.JOIN（データベースにおいて）" . '<br>';
echo "JOINとはテーブル結合のこと。データベースの話に出てくる用語の一つであり、
    複数のテーブル（データを入れておく箱）を合体させて一つのテーブルっぽくする
    こと。データベースはテーブル単位でデータをまとめています。各テーブルのデータを
    使いたい場合、それぞれSELECT文でデータを取得すれば良いです。ただ、テーブル同士
    のデータが紐付ている場合、データを取得した後に、データの紐付けを行う必要がありま
    す。SQLでは、データ取得の際にテーブルを結合させることができ、紐付けたデータを
    取得することができます。例えば、ユーザーの情報を管理しているusersテーブルと
    契約情報を管理しているcontractsテーブルがあるとします。
    usersテーブルには、ユーザーの名前や住所の情報が管理されていて、
    contractsテーブルには、契約日や契約内容が管理されています。
    ユーザー情報と契約情報は同時に取得したい場面があるので、
    contractsテーブルにuser_idというカラムを用意してusersテーブルのidと
    一致する様に紐付けて、どの契約が誰のかを判断することができます。
    " . '<br>' . '<br>';
echo "3.コンフリクト" . '<br>';
echo "ITの分野では、複数の装置やプログラムなどが同じ資源を同時に利用しようと
    して強豪状態になってしまうことを意味する場合が多い。
    コンピュータシステムの中で共存する複数のソフトウェアやハードウェアが、同じ資源（メ
    モリ領域やI/Oポートなど）を同時に利用しようとして奪い合いになったり、動作が不安定
    なったりすることをコンフリクトという。
    プログラミングなどで、複数のライブラリなどが同じ名前空間やクラス名、
    変数名などを定義していて、両者を同時に利用できない状態になってしまうことを
    コンフリクトという。
    データベースシステムやファイルシステム、バージョン管理システムなどで、
    同じ対象や領域（レコードやファイルなど）に同時に複数の更新要求が発生し、
    内容が損なわれたり要求が拒絶されるなど正常に処理できない状態のことを
    コンフリクトという。" . '<br>' . '<br>';
?>
