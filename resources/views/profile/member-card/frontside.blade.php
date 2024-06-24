<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600;700&display=swap" rel="stylesheet">
    <script src="https://unpkg.com/tailwindcss-jit-cdn"></script>
    <script type="tailwind-config">
        module.exports = {
            mode: 'jit',
            theme: {
                fontFamily: {
                    sans: ['Montserrat'],
                },
            }
        }
    </script>
    <link rel="icon" type="image/x-icon" href="https://maritimmuda.id/assets/images/favicon.png">
</head>
<body id="page" class="font-sans">
    <div class="bg-white max-w-[210mm] h-[120mm] px-16">
        <div class="relative">
            {{-- depan / front --}}
            {{-- <img class="absolute top-0 left-0" src="https://res.cloudinary.com/zhanang19/image/upload/v1632832674/id_card_maritim_fix_1-1_hpzjv0.png" alt=""> --}}
            <img class="absolute top-0 left-0" src="https://res.cloudinary.com/maritimmudawda/image/upload/v1719211195/id_card_maritim_fix_1-1-DEPAN_atap8d.png" alt="">
        </div>
        <div class="relative">
            <!-- Foto -->
            <img
                class="absolute top-0 left-0 rounded-full mt-[45px] ml-[44px] w-[185px]"
                src="{{ $user->photo_thumb_link }}"
                alt=""
            />

            <div class="absolute mt-[163px] ml-[243px] leading-none">
                <div class="tracking-[-0.070em] font-bold text-[28px]">
                    {{ Str::limit($user->name ?? 'Nama Lengkap Anggota', 22) }}
                </div>
                <div class="mt-[6px] tracking-[-0.08em] font-semibold text-[#106C9F] text-[22px]">
                    {{ $user->member_type ?: 'Jenis Keanggotaan' }}
                </div>
            </div>

            <!-- QR Code -->
            @empty ($user->id)
                <img
                    class="absolute top-0 mt-[213px] ml-[539px] w-[71px] h-[71px]"
                    src="https://res.cloudinary.com/zhanang19/image/upload/v1632832748/Crunchify.com-QRCode-gray-color_olqkuu.png"
                    alt=""
                >
            @else
                {{ $user->generateQrCode() }}
            @endempty

            <!-- Blur TTD -->
            @empty ($user->id)
                <div class="absolute mt-[295px] ml-[494px] w-[150px] h-[75px] bg-white/45 backdrop-blur-[4px]"></div>
            @endempty

            <div class="tracking-[0.033em] font-semibold text-[13px]">
                <!-- No. Anggota -->
                <div class="absolute mt-[289px] ml-[37px]">
                    {{ $user->uid ?? 'AABBCCDDDD' }}
                </div>

                <!-- Provinsi -->
                <div class="absolute mt-[334px] ml-[37px] leading-[1.35]">
                    <div>{{ $user->province->name ?? 'Nama Provinsi' }}</div>
                </div>

                <!-- Tanggal Berlaku -->
                <div class="absolute mt-[289px] ml-[183px]">
                    {{ $user->membership?->verified_at?->format('d/m/Y') ?? 'DD/MM/YYYY' }}
                </div>

                <!-- Tanggal Berakhir -->
                <div class="absolute mt-[334px] ml-[183px]">
                    {{ $user->membership?->expired_at?->format('d/m/Y') ?? 'DD/MM/YYYY' }}
                </div>

                <!-- Peminatan/Keahlian -->
                <div class="absolute mt-[289px] ml-[326px] w-[180px]">
                    {{ $user->firstExpertise->name }}
                </div>
            </div>
        </div>
    </div>
    <!-- Dibawah merupahan setting untuk seumur hidup, tolong ubah "//" menjadi komen -->
    <!-- <div class="bg-white max-w-[210mm] h-[120mm] px-16">
        <div class="relative">
            <img class="absolute top-0 left-0" src="https://res.cloudinary.com/maritimmudawda/image/upload/v1713174935/id_card_maritim_fix_1-1-SEMURHIDUP_hpzjv0_bgshx1.png" alt="">
        </div>
        <div class="relative">
            // Foto
            <img
                class="absolute top-0 left-0 rounded-full mt-[45px] ml-[44px] w-[185px]"
                src="{{ $user->photo_thumb_link }}"
                alt=""
            />

            <div class="absolute mt-[163px] ml-[243px] leading-none">
                <div class="tracking-[-0.070em] font-bold text-[28px]">
                    {{ Str::limit($user->name ?? 'Nama Lengkap Anggota', 22) }}
                </div>
                <div class="mt-[6px] tracking-[-0.08em] font-semibold text-[#106C9F] text-[22px]">
                    {{ $user->member_type ?: 'Jenis Keanggotaan' }}
                </div>
            </div>

            // QR Code
            @empty ($user->id)
                <img
                    class="absolute top-0 mt-[213px] ml-[539px] w-[71px] h-[71px]"
                    src="https://res.cloudinary.com/zhanang19/image/upload/v1632832748/Crunchify.com-QRCode-gray-color_olqkuu.png"
                    alt=""
                >
            @else
                {{ $user->generateQrCode() }}
            @endempty

            // Blur TTD
            @empty ($user->id)
                <div class="absolute mt-[295px] ml-[494px] w-[150px] h-[75px] bg-white/45 backdrop-blur-[4px]"></div>
            @endempty

            <div class="tracking-[0.033em] font-semibold text-[13px]">
                // No. Anggota
                <div class="absolute mt-[289px] ml-[37px]">
                    {{ $user->uid ?? 'AABBCCDDDD' }}
                </div>

                // Provinsi
                <div class="absolute mt-[334px] ml-[37px] leading-[1.35]">
                    <div>{{ $user->province->name ?? 'Nama Provinsi' }}</div>
                </div>

                // Berlaku
                <div class="absolute mt-[289px] ml-[183px]">
                    Seumur Hidup
                </div>

                // Peminatan/Keahlian
                <div class="absolute mt-[289px] ml-[326px] w-[180px]">
                    {{ $user->firstExpertise->name }}
                </div>
            </div>
        </div>
    </div> -->
    <div class="bg-white max-w-[210mm] px-16">
        <div class="relative">
            {{-- belakang / back --}}
            {{-- <img class="absolute top-0 left-0" src="https://res.cloudinary.com/zhanang19/image/upload/v1632706004/backside_wnlnft.png" alt=""> --}}
            <img class="absolute top-0 left-0" src="https://res.cloudinary.com/maritimmudawda/image/upload/v1719211156/id_card_maritim_fix_1-1-BELAKANG_pdcnas.png" alt="">
        </div>
    </div>
</body>
</html>
