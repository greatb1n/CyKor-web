# PHP 게시판

## CyKorDB 구조 
![image](https://user-images.githubusercontent.com/86897696/199748766-417fc963-365e-4ab0-83da-b4043b168913.png)
![image](https://user-images.githubusercontent.com/86897696/199748894-34afad4c-2598-47f2-940c-4d9c4a5261da.png)

## 구현 기능 

### register
- 회원 가입 기능 
- ID 중복 확인 
- ID, PW 입력
- PW 확인 기능까지 넣어 잘못된 비번 생성 방지

### login
 - 저장된 ID, PW 비교 
 - 맞으면 index.php로 이동
 - 틀리면 history.back

### write content 
 - name은 변경 불가 
 - title, content 필수 작성 후 submit 가능
 - 날짜 시간 표시 기능 
### read content
 - content number를 기반으로 내용 읽기
 - userid를 확인하여 작성자이면 수정 삭제 기능 추가
### update content
 - read랑 전체적인 기능은 비슷하다. 
 - update시 mysql board update. 
### delete content
 - mysql에서 해당 게시글 삭제

