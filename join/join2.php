<!DOCTYPE html>
<html lang="ko">

<head>
    <meta charset="UTF-8">
    <title>WEBSLOPER BLOG : 회원가입</title>

    <?php include "../include/head.php" ?>
    <!-- //head -->

    <style>
        #layer {
            display: none;
            position: fixed;
            overflow: hidden;
            z-index: 1;
        }
        #layer img {
            position: absolute;
            right: -3px;
            top: -3px;
            display: block;
            width: 20px;
            height: 20px;
            z-index: 1;
            cursor: pointer;
        }
    </style>
</head>

<body>
    <?php include "../include/skip.php" ?>
    <!-- //skip -->

    <?php include "../include/header.php" ?>
    <!-- //header -->

    <main id="main" role="main" class="mb100">
        <div class="container">
            <div class="intro__inner join line-bot">
                <div class="img"></div>
                <h2>회원가입</h2>
                <p>
                    정확한 정보를 기입 바랍니다.<br>
                    회원가입에 필요한 <em>개인정보</em>는 안전하게 보관됩니다.
                </p>
            </div>
            <!-- //intro__inner -->

            <div class="member__inner">
                <div class="member__sub">
                    <h2>정보 입력</h2>
                    <ul>
                        <li><a href="#">1</a></li>
                        <li class="active"><a href="#">2</a></li>
                        <li><a href="#">3</a></li>
                    </ul>
                </div>
                <div class="member__insert">
                    <form action="join3.php" name="join" method="post" onsubmit="return joinChecks()">
                        <fieldset>
                            <legend class="blind">회원가입 영역</legend>
                            <div>
                                <label for="youID" class="required">아이디</label>
                                <div class="check">
                                    <input type="text" name="youID" id="youID" placeholder="아이디를 적어주세요!"
                                        autocomplete="off" class="input-style">
                                    <div class="btn" onclick="IDChecking()">아이디 중복검사</div>
                                </div>
                                <p class="msg" id="youIDComment"></p>
                            </div>
                            <div>
                                <label for="youName" class="required">이름</label>
                                <input type="text" name="youName" id="youName" placeholder="이름을 적어주세요!"
                                    autocomplete="off" class="input-style">
                                <p class="msg" id="youNameComment"></p>
                            </div>
                            <div>
                                <label for="youEmail" class="required">이메일</label>
                                <div class="check">
                                    <input type="email" name="youEmail" id="youEmail" placeholder="이메일을 적어주세요!"
                                        autocomplete="off" class="input-style">
                                    <div class="btn" onclick="emailChecking()">이메일 중복검사</div>
                                </div>
                                <p class="msg" id="youEmailComment"></p>
                            </div>
                            <div>
                                <label for="youPass" class="required">비밀번호</label>
                                <input type="password" name="youPass" id="youPass" placeholder="비밀번호를 적어주세요!"
                                    autocomplete="off" class="input-style">
                                <p class="msg" id="youPassComment"></p>
                            </div>
                            <div>
                                <label for="youPassC" class="required">비밀번호</label>
                                <input type="password" name="youPassC" id="youPassC" placeholder="다시 한번 비밀번호를 적어주세요!"
                                    autocomplete="off" class="input-style">
                                <p class="msg" id="youPassCComment"></p>
                            </div>
                            <div>
                                <label for="youEmail" class="required">주소</label>
                                <div class="check">
                                    <input type="text" name="youAddress1" id="youAddress1" placeholder="우편번호"
                                        autocomplete="off" class="input-style">
                                    <div class="btn" id="addressCheck">주소 찾기</div>
                                </div>

                                <label for="youAddress2" class="required blind">주소</label>
                                <input type="text" name="youAddress2" id="youAddress2" placeholder="주소"
                                    autocomplete="off" class="input-style">

                                <label for="youAddress3" class="required blind">상세 주소</label>
                                <input type="text" name="youAddress3" id="youAddress3" placeholder="상세 주소"
                                    autocomplete="off" class="input-style">
                                <p class="msg" id="youAddressComment"></p>
                            </div>
                            <div>
                                <label for="youPhone" class="required">연락처</label>
                                <input type="text" name="youPhone" id="youPhone" placeholder="하이픈 없이 숫자만 적어주세요!"
                                    autocomplete="off" class="input-style">
                                <p class="msg" id="youPhoneComment"></p>
                            </div>
                            <div class="center">
                                <button type="submit" class="btn-style">회원가입</button>
                            </div>
                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
    </main>
    <!-- //main -->

    <?php include "../include/footer.php" ?>
    <!-- //footer -->

    <div id="layer">
        <img src="https://t1.daumcdn.net/postcode/resource/images/close.png" id="btnCloseLayer" alt="닫기 버튼">
    </div>

    <script src="https://t1.daumcdn.net/mapjsapi/bundle/postcode/prod/postcode.v2.js"></script>
    <script>
        // 우편번호 찾기 화면을 넣을 element
        const layer = document.querySelector("#layer");
        const searchIcon = document.querySelector("#addressCheck");
        const layerCloseBtn = document.querySelector("#btnCloseLayer");

        searchIcon.addEventListener('click', searchBtnClick);
        layerCloseBtn.addEventListener('click', closeDaumPostcode);

        function closeDaumPostcode() {
            layer.style.display = 'none';
        }

        const themeObj = {
            //bgColor: "", //바탕 배경색
            searchBgColor: "#0B65C8", //검색창 배경색
            //contentBgColor: "", //본문 배경색(검색결과, 결과없음, 첫화면,검색서제스트)
            //pageBgColor: "", //페이지 배경색
            //textColor: "", //기본 글자색
            queryTextColor: "#FFFFFF" //검색창 글자색
            //postcodeTextColor: "", //우편번호 글자색
            //emphTextColor: "", //강조 글자색
            //outlineColor: "", //테두리
        };

        function searchBtnClick() {
            new daum.Postcode({
                theme: themeObj,
                oncomplete: function (data) {
                    let addr = ''; // 주소 변수
                    let extraAddr = ''; // 참고항목 변수

                    //사용자가 선택한 주소 타입에 따라 해당 주소 값을 가져온다.
                    if (data.userSelectedType === 'R') { // 사용자가 도로명 주소를 선택했을 경우
                        addr = data.roadAddress;
                    } else { // 사용자가 지번 주소를 선택했을 경우(J)
                        addr = data.jibunAddress;
                    }

                    document.querySelector('#youAddress1').value = data.zonecode; // 우편번호
                    document.querySelector("#youAddress2").value = addr; // 주소
                    document.querySelector("#youAddress3").focus();
                    layer.style.display = 'none';
                },
                width: '100%',
                height: '100%',
                maxSuggestItems: 5
            }).embed(layer);

            // iframe을 넣은 element를 보이게 한다.
            layer.style.display = 'block';

            // iframe을 넣은 element의 위치를 화면의 가운데로 이동시킨다.
            initLayerPosition();
        }

        function initLayerPosition() {
            const width = 500;          //우편번호서비스가 들어갈 element의 width
            const height = 500;         //우편번호서비스가 들어갈 element의 height
            const borderWidth = 5;      //샘플에서 사용하는 border의 두께

            layer.style.width = width + 'px';
            layer.style.height = height + 'px';
            layer.style.border = borderWidth + 'px solid';
            layer.style.left = (((window.innerWidth || document.documentElement.clientWidth) - width) / 2 - borderWidth) + 'px';
            layer.style.top = (((window.innerHeight || document.documentElement.clientHeight) - height) / 2 - borderWidth) + 'px';
        }
    </script>

    <script>
        let isIDCheck = false;
        let isEmailCheck = false;

        function IDChecking(){
            let youID = $("#youID").val();
            let idPattern = /^[a-zA-Z0-9]{4,20}$/;

            if (youID === '') {
                $("#youIDComment").text("➟ 아이디를 입력해주세요.");
                $("#youID").focus();
                return false;
            } else if (!idPattern.test(youID)) {
                $("#youIDComment").text("➟ 아이디는 4~20글자의 영문자와 숫자로만 가능합니다.");
                $("#youID").focus();
                return false;
            }

            $.ajax({
                url: 'checkID.php',
                type: 'POST',
                dataType: 'json',
                data: { youID: youID },
                success: function(response) {
                    if (response.status === 'error') {
                        $("#youIDComment").text(response.message);
                        isIDCheck = false;
                    } else {
                        $("#youIDComment").text(response.message);
                        isIDCheck = true;
                    }
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    console.error(textStatus, errorThrown);
                    $("#youIDComment").text("서버 오류가 발생했습니다. 다시 시도해주세요.");
                }
            });
        }

        function emailChecking(){
            let youEmail = $("#youEmail").val();
            let emailPattern = /^[a-zA-Z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$/;

            if (youEmail === '') {
                $("#youEmailComment").text("➟ 이메일을 입력해주세요.");
                $("#youEmail").focus();
                return false;
            } else if (!emailPattern.test(youEmail)) {
                $("#youEmailComment").text("➟ 유효한 이메일 주소를 입력해주세요.");
                $("#youEmail").focus();
                return false;
            }

            $.ajax({
                url: 'checkEmail.php',
                type: 'POST',
                dataType: 'json',
                data: { youEmail: youEmail },
                success: function(response) {
                    if (response.status === 'error') {
                        $("#youEmailComment").text(response.message);
                        isEmailCheck = false;
                    } else {
                        $("#youEmailComment").text(response.message);
                        isEmailCheck = true;
                    }
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    console.error(textStatus, errorThrown);
                    $("#youEmailComment").text("서버 오류가 발생했습니다. 다시 시도해주세요.");
                }
            });
        }

        function joinChecks() {
            // 메세지 초기화
            $(".msg").text("");

            // 아이디 검사
            let youID = $("#youID").val();
            let idPattern = /^[a-zA-Z0-9]{4,20}$/;

            if (youID === '') {
                $("#youIDComment").text("➟ 아이디를 입력해주세요.");
                $("#youID").focus();
                return false;
            } else if (!idPattern.test(youID)) {
                $("#youIDComment").text("➟ 아이디는 4~20글자의 영문자와 숫자로만 가능합니다.");
                $("#youID").focus();
                return false;
            }

            // 이름 검사
            let youName = $("#youName").val();
            let namePattern = /^[가-힣]{3,5}$/;

            if (youName === '') {
                $("#youNameComment").text("➟ 이름을 입력해주세요.");
                $("#youName").focus();
                return false;
            } else if (!namePattern.test(youName)) {
                $("#youNameComment").text("➟ 이름은 3~5글자의 한글로만 가능합니다.");
                $("#youName").focus();
                return false;
            }

            // 이메일 검사
            let youEmail = $("#youEmail").val();
            let emailPattern = /^[a-zA-Z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$/;

            if (youEmail === '') {
                $("#youEmailComment").text("➟ 이메일을 입력해주세요.");
                $("#youEmail").focus();
                return false;
            } else if (!emailPattern.test(youEmail)) {
                $("#youEmailComment").text("➟ 유효한 이메일 주소를 입력해주세요.");
                $("#youEmail").focus();
                return false;
            }

            // 비밀번호 검사
            let youPass = $("#youPass").val();
            let passPattern = /^(?=.*[A-Za-z])(?=.*\d)(?=.*[@$!%*#?&])[A-Za-z\d@$!%*#?&]{4,20}$/; // 최소 4자, 최대 20자, 하나 이상의 문자, 숫자, 특수문자 포함

            if (youPass === '') {
                $("#youPassComment").text("➟ 비밀번호를 입력해주세요.");
                $("#youPass").focus();
                return false;
            } else if (!passPattern.test(youPass)) {
                $("#youPassComment").text("➟ 비밀번호는 4~20자의 영문자, 숫자, 특수문자를 포함해야 합니다.");
                $("#youPass").focus();
                return false;
            }

            // 비밀번호 확인 검사
            let youPassC = $("#youPassC").val();
            if (youPassC === '') {
                $("#youPassCComment").text("➟ 비밀번호 확인을 입력해주세요.");
                $("#youPassC").focus();
                return false;
            } else if (youPass !== youPassC) {
                $("#youPassCComment").text("➟ 비밀번호가 일치하지 않습니다.");
                $("#youPassC").focus();
                return false;
            }

            // 주소 검사
            let youAddress1 = $("#youAddress1").val();
            let youAddress2 = $("#youAddress2").val();
            let youAddress3 = $("#youAddress3").val();
            if (youAddress1 === '' || youAddress2 === '' || youAddress3 === '') {
                $("#youAddressComment").text("➟ 주소를 모두 입력해주세요.");
                $("#youAddress1").focus();
                return false;
            }

            // 연락처 검사
            let youPhone = $("#youPhone").val();
            let phonePattern = /^[0-9]{10,11}$/; // 10-11자리 숫자만 허용

            if (youPhone === '') {
                $("#youPhoneComment").text("➟ 연락처를 입력해주세요.");
                $("#youPhone").focus();
                return false;
            } else if (!phonePattern.test(youPhone)) {
                $("#youPhoneComment").text("➟ 유효한 연락처를 입력해주세요. (숫자만, 10-11자리)");
                $("#youPhone").focus();
                return false;
            }

            // 중복 확인이 이루어졌는지 검사
            if(!isIDCheck || !isEmailCheck){
                alert("중복 확인을 먼저 진행해주세요!");
                return false;
            } else {
                alert("회원가입을 축하합니다.!");
                return true; // 조건을 모두 만족하면 폼 제출을 허용
            }
        }

        $(document).ready(function () {
            // Input 박스에 포커스가 가면 메시지를 지우는 이벤트 리스너 추가
            $("input").focus(function () {
                $(".msg").text("");
            });
        });
    </script>
</body>

</html>