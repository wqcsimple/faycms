#! /bin/bash
# Author whis

echo "--help:"
echo -e "参数$1: \n 1 - 提交更新;\n 2 - 上线;\n 3 - 同步master;\n other - 自定义commit;"

commit_message="update";

if test -z "$1"
then
    read dataOne
else
    dataOne=$1
fi

case ${dataOne} in
  1)
    commit_message="update"
   ;;
  2)
    commit_message="release new version"
  ;;
  3)
    git status && git add -A && git commit -m "commit for merge" && git pull origin master
    exit
  ;;
  *)
    commit_message=${dataOne};
  ;;
esac

branch_list=$(git branch | grep '*')
current_branch=${branch_list:2}

git status && git add -A && git commit -m "${commit_message}" && git push origin ${current_branch}