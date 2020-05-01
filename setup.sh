#!/bin/bash
read -p "プレフィックスを入力してください: " INPUTDATA
echo "\033[0;32m----------------------------------------\033[0;39m"

echo "プレフィックス => $INPUTDATA"
echo "\033[0;32m----------------------------------------\033[0;39m"

while true; do
    read -p '実行はMacOSですか？[y/n]' yn
    case $yn in
        [Yy] ) grep -rl '{plugin_prefix}' . | grep -v './setup.sh' | xargs sed -i "" "s/{plugin_prefix}/$INPUTDATA/g";;
        [Nn] ) grep -rl '{plugin_prefix}' . | grep -v './setup.sh' | xargs sed -i "s/{plugin_prefix}/$INPUTDATA/g";;
        * ) echo "[y/n]で入力してください";;
    esac
done

rm setup.sh

echo "\033[0;32m----------------------------------------\033[0;39m"

echo "ディレクトリ名と直下のPHPファイル名称を変更してください。"