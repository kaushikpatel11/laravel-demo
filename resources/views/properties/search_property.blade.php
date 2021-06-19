@extends('template.template')


@section('content')
<div class="card card-custom">
    <div class="card-header">
        <h3 class="card-title">
            @lang('Base Controls')
        </h3>
        <div class="card-toolbar">
            <div class="example-tools justify-content-center">
                <span class="example-toggle" data-toggle="tooltip" title="View code"></span>
                <span class="example-copy" data-toggle="tooltip" title="Copy code"></span>
            </div>
        </div>
    </div>
    <h1>@lang('Busqueda propiedad')</h1>

    <!-- Search form -->
    <form class="form-inline d-flex justify-content-center md-form form-sm active-cyan active-cyan-2 mt-2">
        <i class="fas fa-search" aria-hidden="true"></i>
        <input class="form-control form-control-sm ml-3 w-75" type="text" placeholder="Search" name="search" aria-label="Search">
    </form>
    <div class="row">

        <div class="form-group row">
            <label class="col-form-label text-right col-lg-3 col-sm-12">@lang('Tipo de propiedad')</label>
            <div class="col-lg-9 col-md-9 col-sm-12">
                <div class="form-check checkbox-list">
                    <label class="checkbox checkbox-outline">
                        <input type="checkbox" name="checkboxes" value="1" />
                        <span></span>
                        @lang('Obra nueva')
                    </label>
                    <label class="checkbox checkbox-outline">
                        <input type="checkbox" name="checkboxes" value="2" />
                        <span></span>
                        @lang('Segunda mano')
                    </label>
                    <label class="checkbox checkbox-outline">
                        <input type="checkbox" name="checkboxes" value="3" />
                        <span></span>
                        @lang('A reformar')
                    </label>
                </div>
                <span class="form-text text-muted">@lang('Por favor, selecciona al menos una opción y como maximo dos')</span>
            </div>
        </div>

        <div class="form-group row">
            <label class="col-form-label text-right col-lg-3 col-sm-12">@lang('Tipo de casa')</label>
            <div class="col-lg-9 col-md-9 col-sm-12">
                <div class="form-check checkbox-list">
                    <label class="checkbox checkbox-outline">
                        <input type="checkbox" name="checkboxes" value="1" />
                        <span></span>
                        @lang('Chalet')
                    </label>
                    <label class="checkbox checkbox-outline">
                        <input type="checkbox" name="checkboxes" value="2" />
                        <span></span>
                        @lang('Piso')
                    </label>
                    <label class="checkbox checkbox-outline">
                        <input type="checkbox" name="checkboxes" value="3" />
                        <span></span>
                        @lang('Adosado')
                    </label>
                </div>
                <span class="form-text text-muted">@lang('Por favor selecciona al menos una opción y como maximo dos')</span>
            </div>
        </div>
        <div class="col-md-1">

            <div class="form-group">
                <label for="exampleSelect1">@lang('Provincia')</label>
                <select class="form-control" id="exampleSelect1" name="provincia">
                    <option>@lang('Alicante')</option>
                    <option>@lang('Valencia')</option>
                    <option>@lang('Madrid')</option>
                    <option>@lang('Barcelona')</option>
                </select>
            </div>
            <div class="form-group">
                <label for="exampleSelect1">Ciudad</label>
                <select class="form-control" id="exampleSelect1" name="provincia">
                    <option>@lang('San Juan')</option>
                    <option>@lang('Valencia')</option>
                    <option>@lang('Madrid')</option>
                    <option>@lang('Barcelona')</option>
                </select>
            </div>
        </div>

        <div class="col-md-1">
            <label for="exampleSelect1">@lang('Precio')</label>
            <div class="form-group">
                <label for="exampleSelects">@lang('Valor mínimo')</label>
                <select class="form-control form-control-sm" id="exampleSelects" name="precio_min">
                    <option value="0">0</option>
                    <option value="50000">50000</option>
                    <option value="100000">100000</option>
                    <option value="200000">200000</option>
                    <option value="500000">500000</option>
                </select>
            </div>
            <div class="form-group">
                <label for="exampleSelects">@lang('Valor máximo')</label>
                <select class="form-control form-control-sm" id="exampleSelects" name="precio_max">
                    <option value="50000">50000</option>
                    <option value="100000">100000</option>
                    <option value="200000">200000</option>
                    <option value="500000">500000</option>
                </select>
            </div>
        </div>

    </div>

    <div class="row">
        @foreach ($properties as $property)

        <div class="card card-custom gutter-b">
            <div class="card-header">
                <div class="card-title">
                    <h3 class="card-label">
                        Property {{$property->propertiescol}}
                    </h3>
                </div>
            </div>
            <div class="card-body">
                <img src="data:image/jpeg;base64,/9j/4AAQSkZJRgABAQAAAQABAAD/2wCEAAkGBxMTEhUTExMWFhUXGSAbGBgYGBoaGxoaGhseGBsYIBogHyggHholHR4aIjEiJSkrLi4uHSAzODMtNygtLisBCgoKDg0OGxAQGy0lHyUtLS0tLS0tLS0wLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLf/AABEIALcBEwMBIgACEQEDEQH/xAAbAAABBQEBAAAAAAAAAAAAAAAFAAIDBAYBB//EAEsQAAECBAQDBQQGBgYJBQEAAAECEQADBCEFEjFBIlFhBhNxgZEyQrHwFCNSocHRB2JyguHxFTOSk8LSFiQ0Q1NzoqOyJURUZLOD/8QAGQEAAwEBAQAAAAAAAAAAAAAAAAECAwQF/8QALhEAAgICAQMDAAoDAQAAAAAAAAECEQMhEgQxQRMiURQjMmFxgaGxwdFSkfAF/9oADAMBAAIRAxEAPwDNIP1pTxlI5MTd/Lk8FZypqWZYKDbh9oA78I0tp4CBWHSgVrBZ3YcRSq4dw936esF5NJw5VIm5wkOyyPFZS9i12cx24VS0YSDNLVpW+Uvla9rvuw082ieKVHUSwAlCV3/VJcnmrR26xdj1YStHJJbFHCY7HYokahYICgQQQ4I0I5wKxial8iyUhQ4FjiQd8qhe9ixb4GEaSbJMxclsmuRRcHUkjk3Ld4D1OJ5SpCpcxJBulkrSPAKByjfbyeOPPm9tSVG0IbtAeopQXUniTmIcG/S2/N29IpzJZcAORpm0b79Hf+EFcUrFTUpcp1JdkhQTYX6MLeLdIDBBDhJzN48L/O0eNOKT0dUW/IYwdNlBQBUbsCQkDTiIsA7C3O5Gx/B1TFTgpiRly5QUlkghJu90g6b3Nox1LV92o8ZQo7ou9nG9wbC/WLtHWlAWhWig+Uhw75hbrG2PMoNWKUbPScsCa3F0y56JZLAg5ifAEQygxaSlARmUsAca1ZQBmtcas7DTxjLr48zHMUkh/eZL5VnV+JkvfXXc+hn6uorgc8Me9noDQih7HSKeA1GeUPtDVy6vEhyRd9eUEcsdcZqUUzNxpmJ7QyE078RUZmiWSLH2jYDicli3lvGan1MxamOYtsWDGyQbb+yH3tePTMSwwTeIgFkFOUjXMUk38AR5xjq6SJKld4p5hAWM4J4SVAozO4IyjfePL6rE078HTjlaAS0oBAzKNnUlsrObh7+rflFZyUm9uVn8onn1ymUUgJ1IIBAS4HlozRQKyt1EsBsSz32G5jha+DZEijmSCVXfTbziGVOUFApLEaEOIuSVSgTmBZmTlyi/iX2eHHPmQrMoEAM7HhBcAO9n206QIZWWVzWLi538tVbC4HpBbCMVXJKAFkS3uHDEeb/lfSB1WpEzMcgz5uotyZ2bS+sLCJgTMGdJUn2SkDN7Qy2feLi6apie0bCqqlTFJVKzFUxWUTDwhzZsmmViL8/G47E5MySkJK7OktmchQSDpqLv5xPS4mghRRKMuWCtyCVKJIsEjUbcrnoYiq8PmrPe5CtJQFDidgn2iSbElufOwjSXuTa7krQT7M4kMsxRzFZCS26iEswO/Jh6WjhxpZzKUVSk3OqlO9g1sovdjq45uKODTCjvMy1IWogZAk51KUCwfUXPnDaVKJ00IWkS2W1nyi4a2pL2Jccz11jklxSslxVj5IQSSZgVnWeMAlTAMOHQEvvzJ5Q7tCiQlUwo91KUsDqS3F5NyuSrlGlo57FUgoSqYmySBbKbOXdg2v3PFTEsClIplkABSQTw2uTofC1o0eN8HVCT2A8Mw6VMlhZKkqAcgpUpKgbDRO/N7PFKokJzFc2YElXuoS5HJJIsAzeZ8TG2paZRppQC2SJQJBCjmLCxYvl14Rz8jh8TplhRTNVc3yDgdg4D5faYizWB1dhGeXHxitFRds5T1LoSlCcygVFsrNmSzOOJR8TyHSIJc4ZyJwOV+IJSMxIvlezB/SOYRLGYpWndgyyA5FnWHYfhpeLNNP4VU7S1HvHLJNwAAySNHYP4DW8Yd9ssG1i051ZEoy7Zl8XnxQouVEqZmOVMtA+yZksEHc8Re5c+cchNBRdVPTKJUiyiBrfxKQdG8d+kRJqcxClKIFnULm50blrYxQm5ipm1Otjr18esOuAl39N933jmV1sg9HwmoC5SSHYWuzsNNNCzFusXIwWDYmUzE8TCwIcJfm4No3NPOStIUkgjoX8nj3ul6n1IU+6OacKY+OgQmhwEdXIiiGrn5EFTOdAGJcnQW589tYynaSepQKlyUuk8JBJIuz3AB0a7h9I0eJzJgUnItMsbqVlIP6oS7nfRttdsjiaFzJuQTsxdg6QgMCk2u6gH014ekcHVzbVG2KPkF1AUrKtUsiwylsoLAMbWNoilkIezncF7Xi5iSFSyc00Fe6R1FlC9xpfk0DqapIIIPG9i7MXfnz3MeW1s6F2JJlYQooUkC7F+fO3rEsqlCZgAX3qW91ObxLHcX5aQOqAc5KnuS7m7vqXs+sSoWlJ4fa8m0L6htxfo+8GkAepa4JBTL7yWFqNytgdgko0A6nlHZaEqKPZTqmZqoJIUTm8y2hbWJsIpptYycneJDg5EIQynLZlMAzMbKfaCc7CqGgAVWzgubqJMp32YFmLWsTlGtzGjsmiXsgplTAgGY5sJaW1J4lEslIZhcvGoKVpH1qMvVJzpHiWBHizdYwVX2sq6gd3SSxRyNAQBnbxZk/uh+sJGJVkiaFSKjOkIlhSF8SFKEtIU7KJCndyCFPryjox5pwSS7CcE+5pcbxUoSkyTmGpWkZghIsoqHLl1EedYxicya6lKc2uQm9m2A1aNkMZoawd3UpVRTz7wP1aif1mCb2fMAdnMBu0HY6pp0lQHfSjcLl3YbEp1HN7jrGefLKf4DhBIyhzF3SRsdxtEqZSu7mKY5UkDpxaX8jBGinySgpUpSQUqsNM/CUnqCQbGwtfm2SpPdzkkknMlSW6KIKiTsx++MaRoUJVIsy1kJcJUHUNnBAB8SIlkpXLlqzy1B05nLXeyVC/U6c4sUld3CjqQoMQFaht07jVr6j1M1ODCfJTPlqJQBdOcOFe+eIgJ20cRUY2tA3sx5XuBcenyIJUFQllEq4ilkgjdwXd7aEXfz2oLk3bc7fxgjhVUtOVRclB4HJZhqkMRbnGaBhjDq/upaUoSqYyyczHKVMQLtoAS4PjpFnAp0pMsfSFryklSZYzkKawFrZX+ec03EhO7gKQZUszFNxBIIIKjZsoF033c+ctZOTM7oKyqQAEqmAh8zEAFmQElTkOdrtcRunW0ySLBO5mz5mZAYsyeEe6z5lEZdtOY8YvUmHqQgSpgSoKf32IJJdSSwCmOXhLkEcjACuqxKXOASHWEhJfRLnx1DbiJCZkuSpGQTZabk3HG7PmOpDswtcQQml3Bolq5kuVUWSbsLi4L8RJ0JYmwsLXjTYj3YpJuRnIchw/EQb8zHnq8UWQczKzEkuczPqehtBOnxfOialCCAoDMRcDiTtbKHYbnSHHNVr5Fx2jUDFe7kSUhkEoSyl3HsjQD8fQxlqgpmFSpq1Ky7JBJU6gLrUAka2g0irlmXKIlKmLCEpdXshTAaMcwD6DXq7xHOl/WJS4mFKUukgIShQcAZDuX97Z+Ti5vlVglQKl4V3yZq5D5QzAuSc3CQxHLMIEUdMtRUhhmCc5BP2Q+h1IB01jS0E3LLW5eYVWSksCQFaEcIFydQ7awJpZykypy9VlQR3jA87OXNwC3gOUYtLTLZ1Ha2obiKCeakh/hCirJwCetIWEODvmQPuJeFBzn95NIq0+JyyXfu1bhXEg6WvoLbiCNTPWWMwhQ0fYu5sYDLogpSQ2qgPUtDqummU6gJZLH3TcekQ4pqhtBTMhSk6ADXLdwN7xvMEQkJB75cx7DMQz6kJ5kdCRHlsjEU5gVJyHmm6T5ajyjT4fiaEpQUJdef2xcNoHa49L7xp08vSlvsRKNo34TDJFQhSilKgSGJ8DvEM2f3kkLllN7kKccOir2I6GwsNozK6aZKnpKE2zBZKFBbm92zBz0HN76R6E89VRkoWFsdnkTEBaCUpLhg4U9mIsbcg+ofWwTFcTmTiRJljKUgZgFAlRUbpVYm+bVrA+MF+0VbnljM8p0gpK0lPEbEjW12Ys0BpVTTTAqScyZhLAgklSiGZ3IShzYPs2mvNlnbas0jEzdTKCCy1EqDgoGoI90qZn1cXZmts3D1ZSZhQFJABIZ7Oz2LjxjRJwJSkywtAIQD70sAl3Ohc7bxdlYSpJdMtCTzCpYOjagxzxhTuy7M7SYQaqaUyjLC1EMkqABB1ym5NtQ768o068BoMOSJldOM2YbCUgFjrZh0PvEDSGSsKUk5kpSld+JK0JUHBBIUC4LE3iLC8MnyJCFFRdFRMGYkLBCkhQ1JDkuSQNXcxSjsCKu7W1lSnu6ZCaOn0GVu8I8bZf3QD1MDqPBpaDmLrWblSrknc+PWNOrtJVjSd/0y/8AJBXsljNRPqO7mTcychOiBdwxsl9404cVbFZlEN8tHFm/8o9bnSFpUQ4ID3cjTplijMrTLUkTQlKVaqz2HqBHN9Nx3VmnoyqzyyfKSoMoAjqBCwqvqaM/6tN4N5Mzil+V3T+6RGwlzMVmZlSn7sOQV92kqD2CQUObfaaIcNrsTnTVSkzClSfbExEtJSOeUocjqAx5xu2mZg+nVh+JLyzZKqWqYqJSHQoJDqJIGUj9oJVyMCaPsTVGapEmZLmyrAzQ/dkO9yXOYNokq8Y3+LVlNRywcRq++XqJbJD+ElAGYdVuBzEY3GP0hVlS6KOX9GlfbIBmN091Pk56xlRSbD9D2IoZBaqmpmTSgllKygJGpSgF2c6ncxFN7GFCSujm95IWH7vMLgEKGWZooW0LanieM1gVMiQiqnTJyxPXLKUzO8AmKUq9iouoWDgOWgHhFTV0JzUs5SQ7mWriQrxSbP1DHrD4tB3J8awzu5jKBcG4KShT2JLHZyQCHdoHLqbhKlKyZnN3N2BN/eYAbaco9Coe3lFWJEjEZKZS9lFzLfmF+1LPj6xUxr9GhH11FMExBuEKIJY/YX7KvNvGM3EDHTqsTJWVSycq3lhQfKgIVb7N2QG8I7SV1RLkgoDIUVMpSEnTXKojTz1HMRRraaYhZRNCkrS3CsEWGzHbyblBPDsWnJl92lCVJKrpyBWYMdr8TA3F79BBYyKjkqnTOJbHUq1YCwDbHZoLVCpctCQpbgZwFpuUqAzZXdlJc3vuLGxivhaUzKgmXLYZdxZJYcRtcHw30MWMVrFP3LiYp+ApGTKsm7DLcMxCswYNs4hrsDM5Mln2goMo+yPac62+Xh1KtSWTcBw4vtzeJDLU4K2uohidS2r6FJ+0/PWDGKI+q+tQlM3NmTlKDuAXy9OfVtGhJAVv6UJQkLmLWwypQk5EpysEuoXNn218XiKpo83EDLubIcqU2zqABU9rs8Mwns/NnDMACl+IuBlHMuQ3r+MapXZJASBKmKzlYQF3yey6gObEKuOnWLXJoCPBZ5CFykSePdRUEhAsAm4JJ10D6Q3D8LMqoqGSF90UqyniSQQpy6t+v8oqowJUyQZwUpLbtmFiUNlfXd/5xTpDUS5y5MlRC1MCn7ZLOLi2pik6SsdbC+LYUtU6YoCxUWsRoW0AhRFWV87Oe8pkqXZyFEaADR9dj1eFFOhmbnJ9n9ofGO1ExQmyr5mcjNfbnrDlIzC4zDpf4RD3IcEEgjTdoyJI69IWs8OVgLa84nRTBEpWX2yHBfQatps5h9NKdSis+0AxA3T/ADh6UkrLMbb36+sYZp7SRLZzCu1C5QKZstK0qbiuCGJuGIY3PrBqlqZM5+6USspY7ZgVEqBl3ctsDybdsyuSDEciiBJ9oWJdHtAi48n16PHTyZVGuxCSllcS1KDEpI1USCyixQHChwvsLRn1VJ9lIQl1AuLCzs5ygMPADXxh+HTJypUwrmpy2BSr2laNe7ts9+W8U58hlsBnDciU35Mbt5RDewo1yqqfUSwpNTMQpCwheRQbiBL2H6mjNex1jqKGq/8An1P9r+EDOz0wSpMxKwXVMQoADUJQsE8tSIvKxc+6gfvfkB+MdEONXIl34LAoar/59T/aH5QWWiYKFImTVzVd+eJerZDa20ZefiM1XvN0Ab+P3w6VWz1hMlKnCluEsm6zw6nxbVodxT0hbLix83gl2UniXNmLKghpK2JLXszPu+0cwbshXTVHvSmSgFjZJVYsWAjQ1c7DMKvNUFz2cD25p8E6IHUsOsOeRVQJBKQqqnKeWShBH9ZM3capQQFG76t5xXxnEqGgZdVO7ycBwhTKmfuyxZAPOw6xhcW/SDX1qjLo0GQg7p4ppH7TcP7ofrFDD+w88nOuTOWolyVJVc8yVa+cckMaXY0cm+4UrP0q1cyYDTUyBKSbiY6lLHUggJ8n8TGmwrtpQV2WXUp+jzx7PeHKQo2eXPDMbtqknlANHZWq2p1DzSPxipiHZKeoMumWR0Gb4Exrx+8kKYx+jHItc6QTPKrlMxX1niFmy/3mPUxnpqCklKklCk+0lTpUNrgjQ89Ikw3E8Rw1ggrVJH+5npVlA5JJui2wLdDGxoO1mHYkEyqpAlTvdTNLFzb6ucG9HBPKBS4gzDLU4I8N4gnNt8Y2WPdgZ0vip1d8ge4phMHgbJX/ANJ8Yy9bQzZJAmoKCQCARdtHaNVJMkFVNIleoF+scwrEquhOalmsglzKVxSz+7seoYxc59TyiGZ82gcUws1tL23oK5Ik4hJElexVdD80zAykHxbxMXa3s1PlJBo1omS3CsqkoKiLMQfZmAABgW9WI85qaMKFx90OwfFquiL0805NTKW6pZ/d28UkGM3BooIdygVc1M5QFnzzHkEE5XISwA95IcNuxZjyqRx5ZKCtrFcpYUGKncLSgBLuQ+7xqKDtnQVwEqtliRN0BUeF/wBWaGKfAtycw+s7FTac99RtM3AcpXZiGyqShV77eBjNodmIrFBeVWVftpTl7wrsxcJdIuprcm0izUilVL4ErRNGgJSX4hqzHR9th4Q+uqFuEzZ07MJ4VkmS2Y34sxUS7EcPU66wRxiolTJSlJJzFYNgC6ieJ9VJAAPtWLjiNhElJAXDpnCoGblYOEpURoNSNzyYuzxpez/aZUxcmRMlZckx3SFWaWsZSLnd3J5kwMwwSZyZMgBJWHUVKmLSM2mVmPIWTqwuLiNFWyZ0lEtE1CZfGtSVo3+pWlKWDGwIDm/4tS47EWeyuIykSJMtamUvMoOCx41e8zPbTXSBSZH0ifVgIAUpIALXS6kAq0dwHNoIYcpBo5SFGWCkqykqAIcqBVzBD/Dk4G9na9q2aSocSQ6nAFym99W1bpFLJdDIxVlhl+kMABwTilLgMWSXIDg2JtCg3Q9mVqQFGaxJNgbM5bRTacoUXsejyD6G3skp8CREoqJw94KH6wB+/WLUMRJClsfsn4iMySWmrnSQpDE/Z+IB84lE1mbXU+sQUUjjWAohikDeynfXyh84C4Zz+McueG7Ia2HcLwhNUxTUSwsi8shRWALOwF06XgvL7Cm7zHcN7Ez8ERkaULynJMXLUA4UlRSTYulwQQOflG6/RxRfTKZSpsydnRMKMwnTgVBkqBICwAeJrco1xStV8FDJXYsp9lbf/wA5v+WHf6IL/wCJ/wBmb/liLGcYMiaqUCOFKSO8nzEZ8xU7LJZLACxd73DQC7UYvVSly8k2dLzykrKe8KmKibPuzaxEeok69umbvAle+xo/9EFf8Q/3M38oQ7Gr+2f7mZ+UYqmxmvmFkz56jySSS3NgIM0CsQUoZ11bb2mflDl1Kj3COBvsHf8AQxf21f3M38ocnsSs/wC8P9xN/KBGLprEt3cyr/7n5QLRNxIn26v0mflEx6yMlZT6dp0emfRqzLJkiYoSQMsxSJcxEwnUKK1e6dOEgg3c3bs3s7Sy05zRSFEHVclyVE6lSlEk73eMlhSarvKcqXVP3qM2bvMpGcO72Zo3P6QlzPoM4yioLGXLkfN7Y0a+jwRy+pCTiyZY+E4pmVxjtnUU6HTKRKQ4SyAN9LN05xmj+kGpWfbV4B/ziCqTNVhxVOzlXfgcbhTNbW8GaIzmp5cqYmWPoyFl0gvq98pLt8I4J5JRj73bt+aX8ndCCb9qS18A6Z24mjdY8f5w+R+k+oRoyv2g8E69NWlJV9Kl2RnYISS17exq4aBeO4BUVAppqUKmFdOlSilP6ynJYMBGWPJBtcv3f9IvIpVqv9I0VN+kmcqQqcqSgAPZJ1AAOhfnFvAaqkxKWqYqipypJYgoAV4lj1HrAFXZ1UvD5mYMQhSh14RF79DErKKnxT8DHo9K3KPJN1f4nDnSTqtmhm15ppsink5EBQJ7tSlqSmWhgSkXKbkAAKA1LFmh86hw+YStfdKJ1Jnq8W9rTpFDtUknEqYj/gL/AP0TBUIS/stY7DpB1fV/R2tXd+a7GeHD6l7I5nZ6gABVLlgK9kmaoA72L3jkvs9h6jlTLlqVyE5RPoFReqwMiXLNpCwyWyn1/kYH1r9VY/mvPygWD2OV/P6A1WA4aCQUygRqO+Va7X4rXgfj2G4bTy0TTT94lSsoyTVG7E65ukHKghKiSHdbf2l5R8YAfpB/2ST/AM3/AAGL6bq3myODX6/eLJhUI8rM3U1GFKsaGZ/eH/NB/sbklS1TpCp6JCFKCpKj3qQyQoqAAUoM/utu7xgiB8mNngE3u8MnzCpQyzcvBdTzBLluCxIbNsH+6O+UUlZhZZre0lLVSVrn031iCRKK0qAmG5GQhpgCgDwluVzGbr6mamSpJMrJOZeVKSFtwlICj7aAAncs92sYqYrIWEpZSFSylk5RLDqSlL2DqBckFzr1dqtQkAAB0hnABJS51N97geUc+SVFWkWsKmkFMxgkhIysU5yUnKGDaWa7k2OkFaqumzlhalqVwlIdmAbiA69W84CS581SEpzjKghiQnhbQZgH8ovzq4kguS9rG1unzvaOPLLftIk/gd3DpyqU+XQNYbs41vvAqrl5BmC38m/ExcVM15vzDC3IF4HVkpi5LHYZbesZ42xIfKr1gABSwOQsI7EKKhLX18fyhR0aKsHZodTzEhbqJAykaPdxDv6Pm/Y+8Q8YXO+x/wBSfzjo5x+TXhL4HInJSpTGzguRr53iFcyz9T95/lFs0MwByhujjbU2P5RybhcxSUkSyQHcjTn8GMc7kn3JUWvA2nWEhZOmW9idjHpH6HP9jmf88/8AgiPOv6LnKSQEK4hbl6ax6d+iWiXLpJiVpKT3yrH9hEa4GqE06Mh+kiSkVq0lYS0qXc3BPFY+Uauv7Mpq5tLLzhBVTI4tR7xgH+kDBZ82smLlyypJQgPbYHn4wbxqf3c2lPKmRt1V1Ec+3ijXhHbHU3fkk7L9lfo1WpJUFHuVXH7SY01AgtNDn+rSQ5JIfONfIQC7N4h3lXMWLfUK2AuCjrBzAlzlImmeEBWRIGXllJPvHclo83JibmuXc6OVduxm8RxJUucuV3U5YR73frvwhWmU821ghhdMqdKEwJmhRJ4O9UdC2rDa+kAu2HdorFliFKluSDrbLvpYCAeE9tp1KrKCCjMw5p4ySRtoWLvoIqPT81oiWbi9noS6BctUpSkzGUtNzNUQL8mvBDH1J7lWZ2dLtrqIz1F2sVU/RkqVqpJy29rMU8vGD+PH6hXl8RHRgjxwZFvt/Bjlk3kgzF9rKNqOaDtUD0yiBtZVmnNMoIzvSISztq7xqe3CGpZv/PT/AOAjKdov/aj/AOrL+KojNCsK/wC8HZ03vytMr1naFSkKHcs6Mj5hpz8Y3mA439HpaYcAJpR7R/WV+UeYTIPdoKhSZVGASB9GTo32lRhixOeo6NupjGCs1eLYh3+HzLDglLFv1kvAf9FA/wBo8Uf4odhayrDakl/6s6t9jpC/RT/7jxR/jj2OkhwwqL8f2eRndzdBTHR/6jIP/wBeZ9y0mLKcUJSF93Yg7dQ+8RY6P/UKf/kTf/JEBa1QRLSpU0pSBxEBW5AGxMcv/oxTcNLz3svpOz/I02I4omXKRMUlTKuwIBHi5aFgmKInZSlKgCVDiI1Ac6Rha/HgKky1TCZPdgJ4SUiYkN1tmBe0a7swXEs5geJTsGbheKnCHrxfHyt78IiLfpPfyWK2pTmAIUPrABcahb+hIaAXb2aFUcogENOa99EKgtiEklQN/wCu9OMwH7bp/wBSR0qP8CofRV60qS8/uVnv01+X7GBf5aNngU3LhNSogqyz0FgcpcGSRdi14xfzrG57Kys+GVScub65Njd27o6b6aaR60+xxoFY1NXPliYtCZbqzAJ0Gcj2lHQNdgLXdybZipmlJZvUBvF9x1jXYhImBIzhRSVJFw5DrSSB0Lezp4XeniwlpIQsBT3QL2uHbdr3Sd30LxzZIp7YwNTVRynJKGV9XBJPgbtvYRLVVi1sCRbQEsBZnfy0EQqpspdGhPvKI30YJP38oS5RNwL882vgCR8I8+TVk6sQAYHMA4fVRfx4ddYdNCGzEO24chtPARAUaOq6bM7H74auWAcxdvB/htEruAwTJX2vj/lPxjsLX2UyyNic4/GFHQo/iVSNIBppr+MWpWVydgm9vB4qy1C3RQ+IiYzBuebRySpI9ZAWa6l5S6QSwKSNgWvpf84fPloBy8YcAG4cNyazEs8cnoUkp/aLHbQj1iITXJIO7OT0eNYfZOSSp7Lgp5Wcj63KVOwKHtoX0IcaDnrHpnYOkyU6yygFzVKGYjRkpt0cGPL1zCglgNXuNfGLVL22qUgJE5KEj3QgWvtcDWOnDHdkZPs0a/tVRIM8KWFe6UlJAf3GPTpAvtoCpcnLxNISklLEAgqcOHvAOR2iqJs2WJszhzX4UswvrqNI9A7By0GTMICFPPmlwkGxWWu17MIjFFrT8G03aTM32FSRULBBDyV6jqmN3QTwULbXKH9DFLtji5pJIWEut3CWsUghKiWBsM6deYgJ2Z7T1FVMCU0ihKUFPMSjhBCSQCQgDW2u8Y5sLlkU/gqM1xoN4hRylrUtYJIDe0oMMr6AtzjwyqIYH2lKe5N82f2reG/M+XvdTKmoKlmSciQVFTjQJcltdo8GnrAJdJDuG5cVw3qDGPQqXKfK++v1J6qqjR6f2Dn06aBHeLGdK1KAzaHMWLA33g9V4jLmylpCw5FmtfbW0eWdp5yDR0CEEhQRMVMB+1MKFMNma7DTM2rwElpsxKgobEX+PKPQx4oqMl/lZhOTck/g9I7d9oUcdPlUQopmBaWOgysxI3B3gR2hU/0Ujekl6+Koz8ytC8udmTLEsHQMh2PsqN7CD+NsRR7f6pL67q8I5uph9XR29JL6wDKN4KdpFpEqhCnB+jJ2DWUrmQ3hA5aIudtbpotADT6nbiMR0q92jbrH7UE8Nxank0U+TnJVNSQk5CACU5eK533D2jQdgu5p5KiubLzrU7pWCMoAy8mLlVo8yqZRyoCR4nYWHpEy1l0gOl0sctnuevJo9GPajy57s9Ux2ukqXKnS1JWuXmSQFJ9hYv7Sg/ElOh5xlqztbSlDIQlRcWWgkEOCR7RuwjGqAG6i3Nv4xWpRd2drlyki/jrFSpma0GMWxGVMmz1ga/1TJ9kZn02s5e9zGvwbtfTy5UoEHOlAchCi5ygE+JG8eZqLcXxbm0W5TNqQ3IPpEQ+Q7npf+mtMSSEKJ1LJUNd+W8Vu0lX9IpEJSkXmBRyupjlOwvcHfbVo88UpSQ78L7kgHpyaLuH45OllSkq9scSWCk6uOEcPha0Em4u4iZKukCCQo3FyChaSPUXeNDgWIS5cmZSHvXnTEkFCTmF0hmZ3t6GASMSClpM8mYSwyhKfZLvYMSoE2sfGKlQjJMUMqsoUoJdJSbHhULvpeGskn3JR6Bi2AiWB9bMOeagB1PldXu226voIxfb2vSurORgEAJYBg4TxK1uVF7ttD6XLMS4K+oOVwfQwF7QSsqwWLEBibvzvrvyiWm/c0XbSKoqSEhgTq9n1ZtvH7ocqoPC+7u5DhufPzi1gUpJzgglm0cc4tT6RH2Fev8Yl4lJ2JbKolDXN4tr0tFGbU7BKwdOnk20XailDuEq9YqTKdRJLKcnyiViS2U0Vvp6/sK9IUTfR18oUVSJotS6koN5nk8OXipLhVuo/De/yIhXSXcqv0EdXTJOpdoxkoy7mnqs6jGLJBJZJ8/HSIxiLk9SS8cFGh7AeJ/kYtyKeR76yegBA9dfhDiopUg5t9zs7ETMXZ7nSJBJzapmW03H3wSoqulQGAb90/FouScQphpl5Hh/hGkZxiW6l5M1QSvr2UogAK0GhCSz23jc0nbGoSlMv6UhAShIH1Zvw6a6hh6xUlYlSP7n9lX5RYTW0YGqfJJ/yxjKe7RtHjVNoq4pWTKxSETKkrSUqCilASyXQpri4KkohtLjFTQgyZM76lN05wl73J294mCCcUpbgLuR7qWPk4brAk1QlkqBV+rzNv5D5EYerKEru/uHkcapURYj20rpwy946SwVlR7psb3szxlKiccyr3Jvbq/q9+kel4biUsgJUplM9yfTc20jA4zJapmHVJW7jdyT+PxjoxZue6McsVxVM7iySBJKw6coA2FkI0UNbFLjXR9YjkFDKaW+jKzKt9wfleNfUz5E6XJkZcsuUggZdToSSS9yX0Z7PoIqU2FyDpnPMZj8IeLqYtFSwt7LeD4NJMhBmJzFYCvaIYHQW5EQcqsOlqEsfYlhCeEFkpJYA+cBjVFACZaUnKGYZiQ3OJZmIzgP6vQWOVV9+cYSxZJeTpjkhHwXf6Jl8k/2R6Q/FMNlTEy0quEJZIuAzksztvAs4rOtwDrwq/PSFNxOcWBlhxuAoBoUcGSPZhLNCXdA/FMEmvwEZRpxM2gb+MC5gIIG4DFwDpYsTGplT1EXSX6JLP48orIlpWSooQ/POxjrhKUV7jmnFS+yZualJSq5BHsgJYdSXU49D5QLpVJcFm5C+2vmLRu0SJAVmMtJWbuFKN3faA+NTJUxSVZAlTM4sNIzn1ceXFJkSx0rbM8wJ18fWJEgaZjry/nFk0Sftt5WD6HRm/OJPowZgqxDfdfbaLjkT7Mw7FJc4yw6mUjkb/ho8QCcHOVRboGtuNNfui/MpyBqlruGBBfTbb74rSaAg3KdNAN9vIGK8WPjqzgJTtYMdH13dvPygnja6hYlpnhglDILkuN1e0QSenIQHUqYkkJPgzO/X77w5S1kAfcRb15+UJNpk8WmWJc5YPuq57erxDjNVnWAzMG1N94hly17l/wAPKGzadRLw0qZfCQU7PTgnMogF7ciOcX5teh7g/PlAalSUhvwiyFjcemkKUpR2noTTRcTWIiTvU8/URRAEdbk8JZ5E8i+Cn7SfWFFIfNoUV9IkHIjXK6XhipcWPKOgCONsRV7uEJe1oshA8YYtEKxEYlQkyoeYXdDcHzgsdjCRycRMClrRwoazfPlDVQwsjSoguHB5/gIrVdS10gjz+dbdIICUWh30ccvL+Maco/BbnaqgbRYgpJfJm5AizMx6ctotzJpKlLKQH4v5DpYxaTTaw7ugOXo8EnFrsPkqC2ElBSkrIcggJNuTanXSDlPh9O7OkndiB8IxfIAEvYAbnlGhwbDMjKXxLewsyPD84nFjfg6Y5r1QVm4QhQ+rVkJuTr5axArAyk/16trNf4wWkEBJ5uBm2L/hdo73o83FvSOtRaRLaYIOAv8A76Zr87w3+g0O5mL83vtBWbUM7MQ45B+ennAXH8QUkBI9pWpfQQN0rJbSVladQUiTxVB9b+G8EJFdRJDZ0nqQSbeUZJUrlEaxHPLI2ZrLXg0tZiNOQcswMxYMQPQhoyOJStwoHoGOzPY8osAODZ/WHZOYb51iV3thLK5LYEzrFgFAcgbfP5RPJmL5H7vWCipaeXpCATybxi+a+DKygiavcDq52iVMl+UW8g5j0hBLH83heoNSa7Fc051jgQOYEWBLDPbq14iUjlCc2DnL5OBucJ0wittoY5Onz5Qc2LkxKUn+UcK+SYjlgg+z6iJs4GzfCFdiGud46gvy9YYovrCZtBCsCV45DR+1Ch2BMV629YY4hgX0ELyjMCfvdtOm0OAHOKilcvhDu8bUwAWczD+F4b3o2iLvH00iNU7q0AFjvfLrCzAC5iqCNYeD4+EAFqWt/ARIFORyimupBszdIcVHl86bwwLmdoS5tubctv4xVStgza/d1i/glJnXmPsp267Dy19I0xx5OilsKYNh/dgzVpOc7N7I5ftGNAhDMNeYAf2rDbTX0ihLW6wNhfmH2221i4maXU241BNmsBZPMmO5JLSNSZBsNC6ntyuQdtmhEOFdG4iDdgC+4hoQbIItlNmAYBhqw5wpqiUrBNrjTQMOQMOhWMnMVuzMG5bnoOkZbGKg96o8uEdOcaics5jZvXkIxuKOJqhzMY51URTejksvc3PIfE3iMr2IPTnHM7WADdTcx3MAeR8/lo5DIWcMGBENJOuzRwThqbnpCXUn3fSEA8BXO/Lp0Ec7p9QRvvtEPfGx5Q76QDrp05wASZr/AIn+MOWXEQKmgJc3+fSIVzQ34fnABOC/yfOGqy7n4nf1iATSCb/fDlT3A3gAdN6gHkecQlPhCVN2LGGlY2hASEXv/GEE7D4RCFRxR+TDETJQObc+Udzt82iLvbaQ6VN9IQDs5+W/KFCMwcjCh2A1yIXeHeGKY7lvm0NNrWiQslMzpEbeZhx0/GI35esAhyr7x1KDs3xMN2jiBDGWEShuXiZRB0+LecVe9uwMSgveBjJUSks9vF/m0NmTE6a9YrTFmFJA3hpASpWTpvYDzjW4fIEtATy11udzAfDaYGY+oSH6OR+XxEGgpiLpBJs5AjtwQqNmiVBGUhku2YnRnY6tvfxh6AWCHNiAbWsyvP8AjFVSjwpTpawUXAT47Ow84kd1NZLB9g7mx+4xuOyzMZyk24RcBtSfyiNSgpKgEgu4ByjwfXnDRMynhIuQD0bw8Y6MrEuh3J9Sf5QARTycx8tW5DrGbx2TlXmfW/3NB8k2ISzgefp/CA/aFBICjoDd33+RGOZXBhLsA0zesIruDrDe8e7Rx20v8uI88xHCa/y8JZtp5xFnYvtHJky3WKAkQtyxEQln3EdcqvZ44vnABKZlt4jBb2b9IfLVs8SFG8AyJKh+rDFAE8vEvDlSmO38YSzdiA8AhhleEdyEawky+piVNwRy0O/8oAIknnaJGSd3/KGsqO2hWAglhrb5vDhLHOGOxeJ84Pl86QAd7o8x98ciQp8PuhRXECnMRYnSIyLwoUQhE0mW8OIA84UKArwNyPf7+kOyAHeFCigEE8v5wyYuOQokGREk3MdSrrChRpEEavCEHuwTqb/l9zQSp5ZzPbhHjc/w+MKFHpJaNDtVVMQcwdwlmsxN/u+Ah8ioQpR4/Fhy8oUKFZaiWaVfCSGYktcuzkCzchEctmLku5f1PSFCgb0JIhXNSzA7Wt1A/GIKuWFJKToQ0KFEXZdGMmJKCUnYtDiSbwoUedJUzmfcbNZrxAhIeFCgAsqWOenPSOANcs3z+cchQIBltR6RLJL3OnKFChiJFps406xXQSTaFCgGdcj58oSJjGFCh0IkWXLgQpZct83EKFBQDJoI1hS0EwoUFAShcKFCirA//9k=" class="img-fluid; max-width: 200px; img-thumbnail" alt="Responsive image">
            </div>
        </div>

        @endforeach
    </div>

</div>
@endsection

@section('js')

@endsection
