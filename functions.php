<?php
function value($string)
{
    return preg_replace('/[^0-9,.]/', '', $string);
}

function datatype($string)
{
    if (strpos($string, 'M') !== false) {
        return 'MB';
    } elseif (strpos($string, 'G') !== false) {
        return 'GB';
    } elseif (strpos($string, 'K') !== false) {
        return 'KB';
    }
}

function benchsh($entry, $logfile, $task = 1)
{
    $file = @fopen($logfile, 'r');
    if ($file) {
        $array = explode("\n", fread($file, filesize($logfile)));
    }
    if (strpos($array[0], 'CPU model') !== false) {
        $cpu = ltrim(str_replace("\r", '', str_replace(':', '', strstr($array[0], ':'))));
        $cpu_cores = ltrim(str_replace("\r", '', str_replace(':', '', strstr($array[1], ':'))));
        $cpu_freq = value(ltrim(str_replace("\r", '', str_replace(':', '', strstr($array[2], ':')))));
        $disk = str_replace(':', '', strstr($array[3], ':'));
        $disk_used = split('[()]', $disk);
        $mem = str_replace(':', '', strstr($array[4], ':'));
        $mem_used = split('[()]', $mem);
        $mem_swap = str_replace(':', '', strstr($array[5], ':'));
        $mem_swap_used = split('[()]', $mem_swap);
        $uptime = ltrim(str_replace("\r", '', str_replace(':', '', strstr($array[6], ':'))));
        $load_avg = ltrim(str_replace("\r", '', str_replace(':', '', strstr($array[7], ':'))));
        $os = ltrim(str_replace("\r", '', str_replace(':', '', strstr($array[8], ':'))));
        $arch = ltrim(str_replace("\r", '', str_replace(':', '', strstr($array[9], ':'))));
        $kernel = ltrim(str_replace("\r", '', str_replace(':', '', strstr($array[10], ':'))));
        $io1 = str_replace(':', '', strstr($array[12], ':'));
        $io2 = str_replace(':', '', strstr($array[13], ':'));
        $io3 = str_replace(':', '', strstr($array[14], ':'));
        $io_avg = str_replace(':', '', strstr($array[15], ':'));
        $speed1 = array_pop(explode(' ', $array[18]));
        $ip1 = preg_match('/\d{1,3}\.\d{1,3}\.\d{1,3}\.\d{1,3}/', $array[18], $ip_match);
        $ip_match = implode(" ", $ip_match);
        $speed2 = array_pop(explode(' ', $array[19]));
        $ip2 = preg_match('/\d{1,3}\.\d{1,3}\.\d{1,3}\.\d{1,3}/', $array[19], $ip_match2);
        $ip_match2 = implode(" ", $ip_match2);
        $speed3 = array_pop(explode(' ', $array[20]));
        $ip3 = preg_match('/\d{1,3}\.\d{1,3}\.\d{1,3}\.\d{1,3}/', $array[20], $ip_match3);
        $ip_match3 = implode(" ", $ip_match3);
        $speed4 = array_pop(explode(' ', $array[21]));
        $ip4 = preg_match('/\d{1,3}\.\d{1,3}\.\d{1,3}\.\d{1,3}/', $array[21], $ip_match4);
        $ip_match4 = implode(" ", $ip_match4);
        $speed5 = array_pop(explode(' ', $array[22]));
        $ip5 = preg_match('/\d{1,3}\.\d{1,3}\.\d{1,3}\.\d{1,3}/', $array[22], $ip_match5);
        $ip_match5 = implode(" ", $ip_match5);
        $speed6 = array_pop(explode(' ', $array[23]));
        $ip6 = preg_match('/\d{1,3}\.\d{1,3}\.\d{1,3}\.\d{1,3}/', $array[23], $ip_match6);
        $ip_match6 = implode(" ", $ip_match6);
        $speed7 = array_pop(explode(' ', $array[24]));
        $ip7 = preg_match('/\d{1,3}\.\d{1,3}\.\d{1,3}\.\d{1,3}/', $array[24], $ip_match7);
        $ip_match7 = implode(" ", $ip_match7);
        $speed8 = array_pop(explode(' ', $array[25]));
        $ip8 = preg_match('/\d{1,3}\.\d{1,3}\.\d{1,3}\.\d{1,3}/', $array[25], $ip_match8);
        $ip_match8 = implode(" ", $ip_match8);
        $speed9 = array_pop(explode(' ', $array[26]));
        $ip9 = preg_match('/\d{1,3}\.\d{1,3}\.\d{1,3}\.\d{1,3}/', $array[26], $ip_match9);
        $ip_match9 = implode(" ", $ip_match9);
        $speed10 = array_pop(explode(' ', $array[27]));
        $ip10 = preg_match('/\d{1,3}\.\d{1,3}\.\d{1,3}\.\d{1,3}/', $array[27], $ip_match10);
        $ip_match10 = implode(" ", $ip_match10);
        $speed11 = array_pop(explode(' ', $array[28]));
        $ip11 = preg_match('/\d{1,3}\.\d{1,3}\.\d{1,3}\.\d{1,3}/', $array[28], $ip_match11);
        $ip_match11 = implode(" ", $ip_match11);
    } else {
        return "Make sure this is a bench.sh output and the first line is the CPU model output";
    }
    if ($task == 1) {
        $connect = mysqli_connect("localhost", "USERNAME", "PASSWORD", "DATABASE");//MYSQL details
        $sql = "INSERT INTO `benchmarks_benchsh` (`vps`, `col`) VALUES ('$entry', '$var')";//MYSQL query
        $result = mysqli_query($connect, $sql);
        return "RAN: " . $sql . "";
    } elseif ($task == 2) {
        header('Content-Type: application/json');
        return array('cpu' => array(
            'cpu_model' => $cpu, 'cpu_cores' => $cpu_cores, 'cpu_freq' => $cpu_freq),
            'disk' => value(explode("(", $disk, 2))[0], 'disk_used' => value($disk_used)[1],
            'mem' => value(explode("(", $mem, 2))[0], 'mem_used' => value($mem_used[1]), 'mem_swap' => value(explode("(", $mem_swap, 2))[0], 'mem_swap_used' => value($mem_swap_used[1]), 'uptime' => $uptime, 'load_avg' => $load_avg,
            'os' => $os, 'arch' => $arch, 'kernel' => $kernel,
            'io' => array(
                'io1' => array('speed' => value($io1), 'type' => datatype($io1)),
                'io2' => array('speed' => value($io2), 'type' => datatype($io2)),
                'io3' => array('speed' => value($io3), 'type' => datatype($io3)),
                'io_avg' => array('speed' => value($io_avg), 'type' => datatype($io_avg))),
            'speedtest' => array(
                'cachefly' => array('ip' => $ip_match, 'speed' => value($speed1), 'type' => datatype($speed1)),
                'l_tokyo' => array('ip' => $ip_match2, 'speed' => value($speed2), 'type' => datatype($speed2)),
                'l_singapore' => array('ip' => $ip_match3, 'speed' => value($speed3), 'type' => datatype($speed3)),
                'l_london' => array('ip' => $ip_match4, 'speed' => value($speed4), 'type' => datatype($speed4)),
                'l_frankfurt' => array('ip' => $ip_match5, 'speed' => value($speed5), 'type' => datatype($speed5)),
                'l_fremont' => array('ip' => $ip_match6, 'speed' => value($speed6), 'type' => datatype($speed6)),
                's_dallas' => array('ip' => $ip_match7, 'speed' => value($speed7), 'type' => datatype($speed7)),
                's_seattle' => array('ip' => $ip_match8, 'speed' => value($speed8), 'type' => datatype($speed8)),
                's_frankfurt' => array('ip' => $ip_match9, 'speed' => value($speed9), 'type' => datatype($speed9)),
                's_singapore' => array('ip' => $ip_match10, 'speed' => value($speed10), 'type' => datatype($speed10)),
                's_hongkong' => array('ip' => $ip_match11, 'speed' => value($speed11), 'type' => datatype($speed10))));
    } else {
        return "Error! Task can only = 1 (MYSQL insert) or 2 (return array)";
    }
}

function nench($entry, $logfile, $task = 1)
{
    $file = @fopen($logfile, 'r');
    if ($file) {
        $array = explode("\n", fread($file, filesize($logfile)));
    }
    if (strpos($array[0], 'nench.sh') !== false) {
        $timestamp = str_replace("\r", '', str_replace('benchmark timestamp: ', '', $array[1]));
        $datetime = ltrim(rtrim(str_replace("UTC", '', $timestamp)));
        $cpu = ltrim(str_replace("\r", '', str_replace(':', '', strstr($array[3], ':'))));
        $cpu_cores = ltrim(str_replace("\r", '', str_replace(':', '', strstr($array[4], ':'))));
        $cpu_freq = str_replace("\r", '', str_replace(':', '', strstr($array[5], ':')));
        $mem = preg_replace('/\D/', '', str_replace(':', '', strstr($array[6], ':')));
        $mem_swap = preg_replace('/\D/', '', str_replace(':', '', strstr($array[7], ':')));
        $kernel = ltrim(str_replace("\r", '', str_replace(':', '', strstr($array[8], ':'))));
        $storage = preg_replace('/\D/', '', str_replace("\r", '', $array[10]));
        $hash = value(str_replace("\r", '', $array[12]));
        $comp = value(str_replace("\r", '', $array[14]));
        $enc = value(str_replace("\r", '', $array[16]));
        $iop_seek = explode(" ", str_replace("\r", '', $array[18]));
        $iop_min = $iop_seek[2];
        $iop_avg = $iop_seek[5];
        $iop_max = $iop_seek[8];
        $iop_mdev = $iop_seek[11];
        $read_speed = explode(" ", str_replace("\r", '', $array[20]));
        $read_speed_requests = $read_speed[1];
        $read_speed_read = $read_speed[7];
        $read_speed_iops = $read_speed[9];
        $read_speed_write = $read_speed[11];
        $io1 = value(strstr($array[22], ':'));
        $io2 = value(strstr($array[23], ':'));
        $io3 = value(strstr($array[24], ':'));
        $io_avg = value(strstr($array[25], ':'));
        $speed1 = value($array[28]);
        $speed2 = value($array[29]);
        $speed3 = value($array[30]);
        $speed4 = value(strstr($array[31], ':'));
        $speed5 = value($array[32]);
    } else {
        return "Not a nench.sh bench output file.";
    }
    if ($task == 1) {
        $connect = mysqli_connect("localhost", "USERNAME", "PASSWORD", "DATABASE");//MYSQL details
        $sql = "INSERT INTO `benchmarks_nench` (`vps`, `col`) VALUES ('$entry', '$var')";//MYSQL query
        $result = mysqli_query($connect, $sql);
        return "RAN: " . $sql . "";
    } elseif ($task == 2) {
        header('Content-Type: application/json');
        return array('cpu' => array(
            'cpu_model' => $cpu, 'cpu_cores' => $cpu_cores, 'cpu_freq' => value($cpu_freq)), 'disk' => $storage, 'mem' => $mem, 'mem_swap' => $mem_swap, 'kernel' => $kernel,
            'hash' => $hash, 'compress' => $comp, 'encrypt' => $enc, 'datetime' => $datetime,
            'iop_seek' => array('min' => $iop_min, 'avg' => $iop_avg, 'max' => $iop_max, 'mdev' => $iop_mdev),
            'iop_read' => array('requests' => $read_speed_requests, 'read' => $read_speed_read, 'iops' => $read_speed_iops, 'write' => $read_speed_write),
            'io' => array(
                'io1' => array('speed' => $io1),
                'io2' => array('speed' => $io2),
                'io3' => array('speed' => $io3),
                'io_avg' => array('speed' => $io_avg)),
            'speedtest' => array(
                'cachefly' => array('speed' => value($speed1)),
                'l_nl' => array('speed' => value($speed2)),
                's_dallas' => array('speed' => value($speed3)),
                'o_france' => array('speed' => value($speed4)),
                'ovh_bhs' => array('speed' => value($speed5))));
    } else {
        return "Error! Task can only = 1 (MYSQL insert) or 2 (return array)";
    }
}
